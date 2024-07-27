<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Closure;

class CompanyRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|String',
            'url'=>'required|url',
            'path'=>'required',
            'email'=>'required|email|unique:companies,email',
            'number'=>[
                'required',
                function (string $attribute, mixed $value, Closure $fail) {
                    if (strpos($value, '961') !== 0) {
                        $fail("The {$attribute} is invalid.");
                    }
                },
            ]
        
            
        ];
    }
}
