<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersData extends FormRequest
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
            //ユーザー編集バリデーション
            'name' => 'required|max:10',
            'email' => 'required|max:30',
        ];
    }
}
