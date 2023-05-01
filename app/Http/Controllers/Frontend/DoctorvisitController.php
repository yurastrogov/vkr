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
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DoctorvisitController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('doctorvisit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$doctorvisits = Doctorvisit::with(['idcontractor', 'mkb'])->get();
        $doctorvisits = Doctorvisit::with(['idcontractor', 'mkb'])->paginate(25);

        return view('frontend.doctorvisits.index', compact('doctorvisits'));
    }

    public function create()
    {
        abort_if(Gate::denies('doctorvisit_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $idcontractors = Contragent::pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        //$mkbs = Mkb::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');
        $mkbs = Mkb::select('id','code','name')->get();

        //dd($mkbs);
        return view('frontend.doctorvisits.create', compact('idcontractors', 'mkbs'));
    }

    public function store(StoreDoctorvisitRequest $request)
    {
        $doctorvisit = Doctorvisit::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $doctorvisit->id]);
        }

        return redirect()->route('frontend.doctorvisits.index');
    }

    public function edit(Doctorvisit $doctorvisit)
    {
        abort_if(Gate::denies('doctorvisit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $idcontractors = Contragent::pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        //$mkbs = Mkb::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');
        $mkbs = Mkb::select('id','code','name')->get();
        $doctorvisit->load('idcontractor', 'mkb');

        return view('frontend.doctorvisits.edit', compact('doctorvisit', 'idcontractors', 'mkbs'));
    }

    public function update(UpdateDoctorvisitRequest $request, Doctorvisit $doctorvisit)
    {
        $doctorvisit->update($request->all());

        return redirect()->route('frontend.doctorvisits.index');
    }

    public function show(Doctorvisit $doctorvisit)
    {
        abort_if(Gate::denies('doctorvisit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $doctorvisit->load('idcontractor', 'mkb');

        return view('frontend.doctorvisits.show', compact('doctorvisit'));
    }

    public function destroy(Doctorvisit $doctorvisit)
    {
        abort_if(Gate::denies('doctorvisit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
