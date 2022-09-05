<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BorrowerRequest extends FormRequest
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
        $rules = [
            'step' => 'required|integer',
            'monthly_sales'=>'required',
            'monthly_expenses'=>'required',
            'other_financing'=>'required|integer|min:0|max:9',
            'other_financing_amount'=>'required',
            'legal_business_name'=>'required',
            'business_physical_address' => 'required',
            'business_physical_city' => 'required',
            'business_physical_province' => 'required|max:2',
            'business_physical_postal' => 'required',
            'dob' => 'required'
        ];

        if($this->method() == 'POST')
            $rules['email'] = 'required|email|unique:borrowers';

        if($this->method()== "PATCH")
            $rules['email'] =  'required|email|unique:borrowers,email,'.$this->borrower;  
            

        return $rules;          
    }
}
