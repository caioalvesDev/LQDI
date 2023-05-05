<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return  [
            'name' =>'required',
            'email' =>'required|unique:contact|email',
            "subject" =>"",
            "message" =>"max:255",
        ];
    }
    public function massage(): array 
    {
        return [
            'name.required' => 'O campo nome é obrigátorio',
            'email.required' => 'O campo email é obrigátorio',
            'email.unique' => 'O email já existe'
        ];
    }
}
