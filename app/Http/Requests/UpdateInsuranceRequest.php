<?php

namespace App\Http\Requests;

use App\Models\Insurance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInsuranceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('insurance_edit');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'min:1',
                'required',
            ],
            'name' => [
                'string',
                'min:1',
                'required',
            ],
        ];
    }
}