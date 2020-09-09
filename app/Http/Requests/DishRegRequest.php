<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishRegRequest extends FormRequest
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

            'name'=> 'required | min: 5',
            'price'=> 'required',
            'user_id'=> 'required',
            'category_id'=> 'required',
            'food_plan'=> 'required',
            'photo_id'=> 'required',
            'content'=> 'required',

        ];
    }

    public function messages(){
        return [
            'user_id.required'=> 'Cook Field is required',
            'category_id.required'=> 'Dish Category is required',
            'photo_id.required'=> 'Dish Imagery is required',
        ];
    }
}
