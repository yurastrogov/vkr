<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySheduleRequest;
use App\Http\Requests\StoreSheduleRequest;
use App\Http\Requests\UpdateSheduleRequest;
use App\Models\Shedule;
use App\Models\Workday;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SheduleController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('shedule_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shedules = Shedule::with(['workdays'])->get();

        $workdays = Workday::get();

        return view('admin.shedules.index', compact('shedules', 'workdays'));
    }

    public function create()
    {
        abort_if(Gate::denies('shedule_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workdays = Workday::pluck('day', 'id');

        return view('admin.shedules.create', compact('workdays'));
    }

    public function store(StoreSheduleRequest $request)
    {
        $shedule = Shedule::create($request->all());
        $shedule->workdays()->sync($request->input('workdays', []));

        return redirect()->route('admin.shedules.index');
    }

    public function edit(Shedule $shedule)
    {
        abort_if(Gate::denies('shedule_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workdays = Workday::pluck('day', 'id');

        $shedule->load('workdays');

        return view('admin.shedules.edit', compact('shedule', 'workdays'));
    }

    public function update(UpdateSheduleRequest $request, Shedule $shedule)
    {
        $shedule->update($request->all());
        $shedule->workdays()->sync($request->input('workdays', []));

        return redirect()->route('admin.shedules.index');
    }

    public function show(Shedule $shedule)
    {
        abort_if(Gate::denies('shedule_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shedule->load('workdays', 'sheduleParamedics');

        return view('admin.shedules.show', compact('shedule'));
    }

    public function destroy(Shedule $shedule)
    {
        abort_if(Gate::denies('shedule_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shedule->delete();

        return back();
    }

    public function massDestroy(MassDestroySheduleRequest $request)
    {
        $shedules = Shedule::find(request('ids'));

        foreach ($shedules as $shedule) {
            $shedule->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}