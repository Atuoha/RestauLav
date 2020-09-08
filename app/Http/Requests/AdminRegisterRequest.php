<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRegisterRequest extends FormRequest
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
            //

            'name'=> 'bail | required | min:10',
            'email'=> 'required',
            'photo_id'=> 'required',
            'role_id'=> 'required',
            'password'=> 'required | min:8',

        ];
    }

    public function messages(){
        return [

            'photo_id.required' => 'Profile picture is requrired',
            'role_id.required' => 'Profile role is requrired',

        ];
    }
}
