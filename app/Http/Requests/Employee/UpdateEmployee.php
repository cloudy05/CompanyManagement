<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployee extends FormRequest
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
            'first_name' => ['sometimes', 'string', 'max:30', 'min:2'],
            'last_name' => ['sometimes', 'string', 'max:30', 'min:2'],
            'email' => ['sometimes', 'email', Rule::unique('employees', 'email')->ignore($this->email, 'email')],
            'phone' => ['string', 'max:15'],
        ];
    }
}
