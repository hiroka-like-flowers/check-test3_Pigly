<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Weight_logRequest extends FormRequest
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
            'date' => 'required',
            'weight' => ['required', 'regex:/^\d{1,3}(\.\d{1})?$/'],
            'calory' => 'required | regex:/^[0-9]+$/',
            'time' => 'required',
            'content' => 'max:120',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '日付を入力してください',
            'weight.required' => '体重を入力してください',
            'weight.regex' => '小数点は1桁まで4桁で入力してください',
            'calory.required' => '摂取カロリーを入力してください',
            'calory.regex' => '数字で入力してください',
            'time.required' => '運動時間を入力してください',
            'content.max' => '120文字以内で入力してください',
        ];
    }
}
