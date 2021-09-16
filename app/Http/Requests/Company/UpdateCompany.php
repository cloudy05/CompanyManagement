<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompany extends FormRequest
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
            'name' => ['sometimes', 'string', 'max:30', 'min:2'],
            'email' => ['sometimes', 'email', Rule::unique('companies', 'email')->ignore($this->email, 'email')],
            'website' => ['url'],
            'logo' => ['sometimes', 'image', 'max:2048', 'dimensions:ratio=1/1,min_width=100,min_height=100'],
        ];
    }
}
