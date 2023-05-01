<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWorkdayRequest;
use App\Http\Requests\StoreWorkdayRequest;
use App\Http\Requests\UpdateWorkdayRequest;
use App\Models\Workday;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WorkdayController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('workday_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workdays = Workday::all();

        return view('admin.workdays.index', compact('workdays'));
    }

    public function create()
    {
        abort_if(Gate::denies('workday_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.workdays.create');
    }

    public function store(StoreWorkdayRequest $request)
    {
        $workday = Workday::create($request->all());

        return redirect()->route('admin.workdays.index');
    }

    public function edit(Workday $workday)
    {
        abort_if(Gate::denies('workday_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.workdays.edit', compact('workday'));
    }

    public function update(UpdateWorkdayRequest $request, Workday $workday)
    {
        $workday->update($request->all());

        return redirect()->route('admin.workdays.index');
    }

    public function show(Workday $workday)
    {
        abort_if(Gate::denies('workday_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.workdays.show', compact('workday'));
    }

    public function destroy(Workday $workday)
    {
        abort_if(Gate::denies('workday_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workday->delete();

        return back();
    }

    public function massDestroy(MassDestroyWorkdayRequest $request)
    {
        $workdays = Workday::find(request('ids'));

        foreach ($workdays as $workday) {
            $workday->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}