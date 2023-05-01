<?php

namespace App\Http\Requests;

use App\Models\Lpu;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLpuRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('lpu_edit');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}