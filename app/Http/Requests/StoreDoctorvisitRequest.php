<?php

namespace App\Http\Requests;

use App\Models\Doctorvisit;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDoctorvisitRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('doctorvisit_create');
    }

    public function rules()
    {
        return [
            'idcontractor_id' => [
                'required',
                'integer',
            ],
            'datetimepriem' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}