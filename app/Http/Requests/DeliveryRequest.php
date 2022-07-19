<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryRequest extends FormRequest
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
            'email' => ['email','required','max:50','unique:delivery_mens,email,except,'.$this->request->get('id')],
            'cin' => ['required','string','unique:delivery_mens,cin,except,'.$this->request->get('id')],
            'carte_grise'=>['required','string','unique:delivery_mens,carte_grise,except,'.$this->request->get('id')],
            'password' => ['required', 'string', 'min:8'],
            'phone' =>['required','max:10','min:9','unique:delivery_mens,carte_grise,except,'.$this->request->get('id')],
            'city' => ['required']




            
        ];
    }
}
