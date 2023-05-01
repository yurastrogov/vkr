<?php

namespace App\Http\Requests;

use App\Models\Shedule;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSheduleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shedule_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:1',
                'max:90',
                'required',
            ],
            'workdays.*' => [
                'integer',
            ],
            'workdays' => [
                'required',
                'array',
            ],
            'worktimestart' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'worktimeend' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
        ];
    }
}