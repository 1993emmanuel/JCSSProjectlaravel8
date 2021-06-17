<?php

namespace App\Http\Requests\User;

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
            'name'=>'required|max:255|string',
            'username'=>'string|required|unique:users,username,'.$this->route('user')->id.'|max:255',
            'password'=>'required|min:6'
            'email'=>'string|required|unique:users,email,'.$this->route('user')->id.'|max:255|email:rfc,dns',
        ];
    }
}
