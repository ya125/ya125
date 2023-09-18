<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Products_editData extends FormRequest
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
             //商品編集バリデーション
             'name' => 'required',
             'amount' => 'required|integer',
             'text' => 'required',
             'image' => 'required',
        ];
    }
}
