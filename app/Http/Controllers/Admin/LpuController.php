<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyLpuRequest;
use App\Http\Requests\StoreLpuRequest;
use App\Http\Requests\UpdateLpuRequest;
use App\Models\Lpu;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LpuController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('lpu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lpus = Lpu::all();

        return view('admin.lpus.index', compact('lpus'));
    }

    public function create()
    {
        abort_if(Gate::denies('lpu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lpus.create');
    }

    public function store(StoreLpuRequest $request)
    {
        $lpu = Lpu::create($request->all());

        return redirect()->route('admin.lpus.index');
    }

    public function edit(Lpu $lpu)
    {
        abort_if(Gate::denies('lpu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lpus.edit', compact('lpu'));
    }

    public function update(UpdateLpuRequest $request, Lpu $lpu)
    {
        $lpu->update($request->all());

        return redirect()->route('admin.lpus.index');
    }

    public function show(Lpu $lpu)
    {
        abort_if(Gate::denies('lpu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lpu->load('insertionContragents');

        return view('admin.lpus.show', compact('lpu'));
    }

    public function destroy(Lpu $lpu)
    {
        abort_if(Gate::denies('lpu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lpu->delete();

        return back();
    }

    public function massDestroy(MassDestroyLpuRequest $request)
    {
        $lpus = Lpu::find(request('ids'));

        foreach ($lpus as $lpu) {
            $lpu->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}