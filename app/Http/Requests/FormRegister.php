<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRegister extends FormRequest
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
            'name'=> 'required',
            'email'=> 'required|email',
            'password'=> 'required',
            'confirmPassword'=> 'required|same:password',
        ];
    }


    public function messages()
    {
        return [
            'name.required'=>'Khong duoc de trong',
            'email.required'=>'Khong duoc de trong',
            'email.email'=>'Sai dinh dang',
            'password.required'=>'Khong duoc de trong',
            'confirmPassword.required'=>'Khong duoc de trong',
            'confirmPassword.same'=>'Mat Khau khong khop',
        ];
    }
}
