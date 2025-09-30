<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Weight_targetRequest extends FormRequest
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
            'weight' => ['required', 'regex:/^\d{1,3}(\.\d{1})?$/'],
        ];
    }

    public function messages()
    {
        return [
            'weight.required' => '体重を入力してください',
            'weight.regex' => '小数点1桁で4桁までで入力してください',
        ];
    }
}
