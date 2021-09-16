<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class CreateCompany extends FormRequest
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
            'name' => ['required', 'string', 'max:30', 'min:2'],
            'email' => ['required', 'email', 'unique:companies,email'],
            'website' => ['url'],
            'logo' => ['required', 'image', 'max:2048', 'dimensions:ratio=1/1,min_width=100,min_height=100'],
        ];
    }
}
