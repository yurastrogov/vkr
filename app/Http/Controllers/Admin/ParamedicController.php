<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyParamedicRequest;
use App\Http\Requests\StoreParamedicRequest;
use App\Http\Requests\UpdateParamedicRequest;
use App\Models\Medicposition;
use App\Models\Paramedic;
use App\Models\Shedule;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ParamedicController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('paramedic_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paramedics = Paramedic::with(['id_user', 'speciality', 'shedule'])->get();

        $users = User::get();

        $medicpositions = Medicposition::get();

        $shedules = Shedule::get();

        return view('admin.paramedics.index', compact('medicpositions', 'paramedics', 'shedules', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('paramedic_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specialities = Medicposition::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $shedules = Shedule::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.paramedics.create', compact('id_users', 'shedules', 'specialities'));
    }

    public function store(StoreParamedicRequest $request)
    {
        $paramedic = Paramedic::create($request->all());

        return redirect()->route('admin.paramedics.index');
    }

    public function edit(Paramedic $paramedic)
    {
        abort_if(Gate::denies('paramedic_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specialities = Medicposition::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $shedules = Shedule::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $paramedic->load('id_user', 'speciality', 'shedule');

        return view('admin.paramedics.edit', compact('id_users', 'paramedic', 'shedules', 'specialities'));
    }

    public function update(UpdateParamedicRequest $request, Paramedic $paramedic)
    {
        $paramedic->update($request->all());

        return redirect()->route('admin.paramedics.index');
    }

    public function show(Paramedic $paramedic)
    {
        abort_if(Gate::denies('paramedic_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paramedic->load('id_user', 'speciality', 'shedule');

        return view('admin.paramedics.show', compact('paramedic'));
    }

    public function destroy(Paramedic $paramedic)
    {
        abort_if(Gate::denies('paramedic_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paramedic->delete();

        return back();
    }

    public function massDestroy(MassDestroyParamedicRequest $request)
    {
        $paramedics = Paramedic::find(request('ids'));

        foreach ($paramedics as $paramedic) {
            $paramedic->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}