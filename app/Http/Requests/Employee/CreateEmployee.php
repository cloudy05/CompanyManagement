<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployee extends FormRequest
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
            'first_name' => ['required', 'string', 'max:30', 'min:2'],
            'last_name' => ['required', 'string', 'max:30', 'min:2'],
            'email' => ['required', 'email', 'unique:employees,email'],
            'phone' => ['string', 'max:15'],
        ];
    }
}
