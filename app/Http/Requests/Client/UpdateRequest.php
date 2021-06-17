<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name'=>'string|required|max:255',
            'dni'=>'string|required|unique:clients,dni,'.$this->route('client')->id.'|max:9',
            'ruc'=>'nullable|string|required|unique:clients,ruc,'.$this->route('client')->id.'|max:11',
            'address'=>'nullable|string|required|max:255',
            'phone'=>'nullable|string|required|unique:clients,phone,'.$this->route('client')->id.'|max:10',
            'email'=>'nullable|string|required|unique:clients,email,'.$this->route('client')->id.'|max:255|email:rfc,dns',
        ];
    }
}
