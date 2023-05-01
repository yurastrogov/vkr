<?php

namespace App\Http\Requests;

use App\Models\Paramedic;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreParamedicRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('paramedic_create');
    }

    public function rules()
    {
        return [
            'id_user_id' => [
                'required',
                'integer',
            ],
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
                'required',
            ],
            'speciality_id' => [
                'required',
                'integer',
            ],
            'shedule_id' => [
                'required',
                'integer',
            ],
        ];
    }
}