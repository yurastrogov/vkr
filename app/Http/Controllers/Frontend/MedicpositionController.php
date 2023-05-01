<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMedicpositionRequest;
use App\Http\Requests\StoreMedicpositionRequest;
use App\Http\Requests\UpdateMedicpositionRequest;
use App\Models\Medicposition;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MedicpositionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('medicposition_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $medicpositions = Medicposition::paginate(25);

        return view('frontend.medicpositions.index', compact('medicpositions'));
    }

    public function create()
    {
        abort_if(Gate::denies('medicposition_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.medicpositions.create');
    }

    public function store(StoreMedicpositionRequest $request)
    {
        $medicposition = Medicposition::create($request->all());

        return redirect()->route('frontend.medicpositions.index');
    }

    public function edit(Medicposition $medicposition)
    {
        abort_if(Gate::denies('medicposition_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.medicpositions.edit', compact('medicposition'));
    }

    public function update(UpdateMedicpositionRequest $request, Medicposition $medicposition)
    {
        $medicposition->update($request->all());

        return redirect()->route('frontend.medicpositions.index');
    }

    public function show(Medicposition $medicposition)
    {
        abort_if(Gate::denies('medicposition_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $medicposition->load('specialityParamedics');

        return view('frontend.medicpositions.show', compact('medicposition'));
    }

    public function destroy(Medicposition $medicposition)
    {
        abort_if(Gate::denies('medicposition_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $medicposition->delete();

        return back();
    }

    public function massDestroy(MassDestroyMedicpositionRequest $request)
    {
        $medicpositions = Medicposition::find(request('ids'));

        foreach ($medicpositions as $medicposition) {
            $medicposition->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
