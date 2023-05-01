<?php

namespace App\Http\Requests;

use App\Models\Contragent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateContragentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contragent_edit');
    }

    public function rules()
    {
        return [
            'surname' => [
                'string',
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'fathername' => [
                'string',
                'nullable',
            ],
            'berthday' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'gender' => [
                'required',
            ],
            'address' => [
                'string',
                'required',
            ],
            'telephone' => [
                'string',
                'max:15',
                'nullable',
            ],
            'snils' => [
                'string',
                'max:17',
                'nullable',
            ],
            'insurance_id' => [
                'required',
                'integer',
            ],
            'polis' => [
                'string',
                'max:20',
                'required',
            ],
            'spasport' => [
                'string',
                'max:6',
                'nullable',
            ],
            'npasport' => [
                'string',
                'max:8',
                'nullable',
            ],
            'pasportvudan' => [
                'string',
                'nullable',
            ],
            'datepasport' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'codepasport' => [
                'string',
                'max:10',
                'nullable',
            ],
        ];
    }
}