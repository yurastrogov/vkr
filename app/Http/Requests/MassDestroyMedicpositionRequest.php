<?php

namespace App\Http\Requests;

use App\Models\Medicposition;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMedicpositionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('medicposition_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:medicpositions,id',
        ];
    }
}