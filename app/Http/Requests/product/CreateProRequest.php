<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProRequest extends FormRequest
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
        $rules = [
            'title' => 'required|max:100',
            'details' => 'required',
            'image'=>'required|image',
            'category_id'=>'required',
            'regular_price'=>'required',
            'quantity'=>'required'
        ];

        return $rules;
    }
}
