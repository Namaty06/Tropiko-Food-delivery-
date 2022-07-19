<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
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
            
            'name' => ['required','string','max:50'],
            'orderemail' => ['required','unique:restaurants,orderEmail','email'],
            'orderphone' => ['required','min:9','max:10','unique:restaurants,orderPhone'],
            'open' => ['required','timezone'],
            'close' => ['required','timezone'],
            'city' => ['required'],
            'dayoff' => ['required','string'],
            'address' => ['required'],
            'logo' => ['image']   
           
        ];
    }
}
