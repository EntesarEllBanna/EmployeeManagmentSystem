<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//مش شرط يكون عامل تسجيل دخول
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname' => 'required|max:50',
            'email' => 'required|max:50|email',
            'gender' => 'required|max:1',
            'country_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'fullname.required' => 'Please enter Full Name',
            'email.required' => 'Please enter E-mail'
        ];
    }
}
