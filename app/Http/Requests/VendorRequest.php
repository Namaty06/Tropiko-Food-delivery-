<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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
            
           'name' => ['required', 'string', 'max:255'],
           'cin' => ['required','string','unique:vendors,cin','min:6','max:9'],
           'email' => ['required', 'email', 'max:255', 'unique:vendors,email'],
           'password' => ['required', 'string', 'min:8'],
           'phone' => ['required','max:10','min:9']


        ];
    }
}
