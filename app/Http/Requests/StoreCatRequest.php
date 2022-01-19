<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'breed' => 'required',
            'birthday' => 'required|date',
            'weight' => 'required|numeric',
            'sex' => 'required',
            'address' => 'required',
            'address_latitude' => 'required',
            'address_longitude' => 'required',
            'photo' => 'nullable|image',
        ];
    }
}
