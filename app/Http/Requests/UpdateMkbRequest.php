<?php

namespace App\Http\Requests;

use App\Models\Mkb;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMkbRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mkb_edit');
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