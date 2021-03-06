<?php

namespace App\Http\Requests\Product;

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
            'name'=>'required|string|unique:products,name,'.$this->route('product')->id.'|max:255',
            // 'code'=>'required|unique:products|max:255',
            // 'image'=>'',
            // 'stock'=>'',
            // 'status'=>'',
            'sell_price'=>'required',

            'category_id'=>'integer|required|exists:App\Models\Category,id',
            'provider_id'=>'integer|required|exists:App\Models\Provider,id',
        ];
    }
}
