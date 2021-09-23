<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StorePeripheralRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('peripheral_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'min:3',
                'max:32',
                'required',
                //'unique:peripherals',
                'unique:peripherals,name,NULL,id,deleted_at,NULL',
            ],
        ];
    }
}
