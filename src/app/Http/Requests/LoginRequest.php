<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Laravel\Fortify\Http\Requests\LoginRequest as FortifyLoginRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required | email',
            'password' => 'required',
            'goal' => ['required', 'regex:/^\d{1,3}(\.\d{1})?$/'],
            'now' => ['required', 'regex:/^\d{1,3}(\.\d{1})?$/'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'お名前を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
            'password.required' => 'パスワードを入力してください',
            'goal.required' => '目標の体重を入力してください',
            'goal.regex' => '小数点は1桁で4桁までの数字で入力してください',
            'now.required' => '現在の体重を入力してください',
            'now.regex' => '小数点は1桁で4桁までの数字で入力してください',
        ];
    }
}
