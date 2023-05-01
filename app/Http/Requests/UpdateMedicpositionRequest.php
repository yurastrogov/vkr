<?php

namespace App\Http\Requests;

use App\Models\Medicposition;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMedicpositionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('medicposition_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:1',
                'required',
            ],
        ];
    }
}