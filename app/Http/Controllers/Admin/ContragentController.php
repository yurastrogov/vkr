<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyContragentRequest;
use App\Http\Requests\StoreContragentRequest;
use App\Http\Requests\UpdateContragentRequest;
use App\Models\Contragent;
use App\Models\Insurance;
use App\Models\Lpu;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContragentController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('contragent_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contragents = Contragent::with(['insurance', 'insertion'])->get();

        $insurances = Insurance::get();

        $lpus = Lpu::get();

        return view('admin.contragents.index', compact('contragents', 'insurances', 'lpus'));
    }

    public function create()
    {
        abort_if(Gate::denies('contragent_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $insurances = Insurance::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $insertions = Lpu::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.contragents.create', compact('insertions', 'insurances'));
    }

    public function store(StoreContragentRequest $request)
    {
        $contragent = Contragent::create($request->all());

        return redirect()->route('admin.contragents.index');
    }

    public function edit(Contragent $contragent)
    {
        abort_if(Gate::denies('contragent_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $insurances = Insurance::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $insertions = Lpu::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contragent->load('insurance', 'insertion');

        return view('admin.contragents.edit', compact('contragent', 'insertions', 'insurances'));
    }

    public function update(UpdateContragentRequest $request, Contragent $contragent)
    {
        $contragent->update($request->all());

        return redirect()->route('admin.contragents.index');
    }

    public function show(Contragent $contragent)
    {
        abort_if(Gate::denies('contragent_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contragent->load('insurance', 'insertion', 'idcontractorDoctorvisits');

        return view('admin.contragents.show', compact('contragent'));
    }

    public function destroy(Contragent $contragent)
    {
        abort_if(Gate::denies('contragent_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contragent->delete();

        return back();
    }

    public function massDestroy(MassDestroyContragentRequest $request)
    {
        $contragents = Contragent::find(request('ids'));

        foreach ($contragents as $contragent) {
            $contragent->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}