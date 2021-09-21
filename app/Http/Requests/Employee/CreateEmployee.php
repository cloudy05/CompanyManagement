<?php

namespace App\Http\Requests\Employee;

use App\Models\Company;
use App\Rules\IsExists;
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
            'phone' => ['numeric', 'digits_between:4,15'],
            // 'company' => ['required', 'in:' . Company::pluck('id')->implode(',')],
            'company' => ['required', new IsExists('companies', 'id')],
        ];
    }
}
