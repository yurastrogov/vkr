<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyMkbRequest;
use App\Http\Requests\StoreMkbRequest;
use App\Http\Requests\UpdateMkbRequest;
use App\Models\Mkb;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MkbController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('mkb_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mkbs = Mkb::all();

        return view('admin.mkbs.index', compact('mkbs'));
    }

    public function create()
    {
        abort_if(Gate::denies('mkb_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mkbs.create');
    }

    public function store(StoreMkbRequest $request)
    {
        $mkb = Mkb::create($request->all());

        return redirect()->route('admin.mkbs.index');
    }

    public function edit(Mkb $mkb)
    {
        abort_if(Gate::denies('mkb_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mkbs.edit', compact('mkb'));
    }

    public function update(UpdateMkbRequest $request, Mkb $mkb)
    {
        $mkb->update($request->all());

        return redirect()->route('admin.mkbs.index');
    }

    public function show(Mkb $mkb)
    {
        abort_if(Gate::denies('mkb_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mkb->load('mkbDoctorvisits');

        return view('admin.mkbs.show', compact('mkb'));
    }

    public function destroy(Mkb $mkb)
    {
        abort_if(Gate::denies('mkb_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mkb->delete();

        return back();
    }

    public function massDestroy(MassDestroyMkbRequest $request)
    {
        $mkbs = Mkb::find(request('ids'));

        foreach ($mkbs as $mkb) {
            $mkb->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}