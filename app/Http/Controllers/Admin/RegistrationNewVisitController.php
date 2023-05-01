<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRegistrationNewVisitRequest;
use App\Http\Requests\StoreRegistrationNewVisitRequest;
use App\Http\Requests\UpdateRegistrationNewVisitRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegistrationNewVisitController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('registration_new_visit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.registrationNewVisits.index');
    }

    public function create()
    {
        abort_if(Gate::denies('registration_new_visit_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.registrationNewVisits.create');
    }

    public function store(StoreRegistrationNewVisitRequest $request)
    {
        $registrationNewVisit = RegistrationNewVisit::create($request->all());

        return redirect()->route('admin.registration-new-visits.index');
    }

    public function edit(RegistrationNewVisit $registrationNewVisit)
    {
        abort_if(Gate::denies('registration_new_visit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.registrationNewVisits.edit', compact('registrationNewVisit'));
    }

    public function update(UpdateRegistrationNewVisitRequest $request, RegistrationNewVisit $registrationNewVisit)
    {
        $registrationNewVisit->update($request->all());

        return redirect()->route('admin.registration-new-visits.index');
    }

    public function show(RegistrationNewVisit $registrationNewVisit)
    {
        abort_if(Gate::denies('registration_new_visit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.registrationNewVisits.show', compact('registrationNewVisit'));
    }

    public function destroy(RegistrationNewVisit $registrationNewVisit)
    {
        abort_if(Gate::denies('registration_new_visit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registrationNewVisit->delete();

        return back();
    }

    public function massDestroy(MassDestroyRegistrationNewVisitRequest $request)
    {
        $registrationNewVisits = RegistrationNewVisit::find(request('ids'));

        foreach ($registrationNewVisits as $registrationNewVisit) {
            $registrationNewVisit->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}