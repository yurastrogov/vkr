<?php

namespace App\Http\Requests;

use App\Models\Workday;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreWorkdayRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('workday_create');
    }

    public function rules()
    {
        return [
            'day' => [
                'string',
                'min:1',
                'required',
            ],
        ];
    }
}