<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDoctorvisitRequest;
use App\Http\Requests\StoreDoctorvisitRequest;
use App\Http\Requests\UpdateDoctorvisitRequest;
use App\Models\Contragent;
use App\Models\Doctorvisit;
use App\Models\Mkb;
use App\Models\Paramedic;
use App\Models\Shedule;
use App\Models\Medicposition;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class RegistrationvisitController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('registration_new_visit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$doctorvisits = Doctorvisit::with(['idcontractor', 'mkb'])->get();
        $doctorvisits = Doctorvisit::with(['idcontractor', 'mkb'])->paginate(25);

        return view('frontend.registrationvisit.index', compact('doctorvisits'));
    }

    public function create()
    {
        abort_if(Gate::denies('registration_new_visit_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$idcontractors = Contragent::pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');
        $idcontractors = Contragent::select('id','surname','name','fathername','berthday','snils','polis')->get();
        //$mkbs = Mkb::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');
        $mkbs = Mkb::select('id','code','name')->get();
        $Paramedic = Paramedic::select('id','surname','name','fathername','id_user_id','speciality_id','shedule_id')->get();
        $Shedule = Shedule::select('id','name','worktimestart','worktimeend')->get();
        $Medicposition = Medicposition::select('id','name')->get();

        //dd($mkbs);
        return view('frontend.registrationvisit.create', compact('idcontractors', 'Paramedic','Shedule','Medicposition','mkbs'));
    }

    public function store(StoreDoctorvisitRequest $request)
    {
        $doctorvisit = Doctorvisit::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $doctorvisit->id]);
        }

        return redirect()->route('frontend.registrationvisit.index');
    }

    public function edit(Doctorvisit $doctorvisit)
    {
        abort_if(Gate::denies('registration_new_visit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $idcontractors = Contragent::pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        //$mkbs = Mkb::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');
        $mkbs = Mkb::select('id','code','name')->get();
        $doctorvisit->load('idcontractor', 'mkb');

        return view('frontend.registrationvisit.edit', compact('doctorvisit', 'idcontractors', 'mkbs'));
    }

    public function update(UpdateDoctorvisitRequest $request, Doctorvisit $doctorvisit)
    {
        $doctorvisit->update($request->all());

        return redirect()->route('frontend.registrationvisit.index');
    }

    public function show(Doctorvisit $doctorvisit)
    {
        abort_if(Gate::denies('registration_new_visit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $doctorvisit->load('idcontractor', 'mkb');

        return view('frontend.registrationvisit.show', compact('doctorvisit'));
    }

    public function destroy(Doctorvisit $doctorvisit)
    {
        abort_if(Gate::denies('registration_new_visit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $doctorvisit->delete();

        return back();
    }

    public function massDestroy(MassDestroyDoctorvisitRequest $request)
    {
        $doctorvisits = Doctorvisit::find(request('ids'));

        foreach ($doctorvisits as $doctorvisit) {
            $doctorvisit->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('doctorvisit_create') && Gate::denies('doctorvisit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Doctorvisit();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
