<?php

namespace App\Http\Requests;

use App\Models\Medicposition;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMedicpositionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('medicposition_create');
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