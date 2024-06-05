<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'year' => 'required|numeric|between:2000,' . date("Y"),
            'production' => 'required|min:1',
            'income' => 'required|min:1',
            'opex' => 'required|min:1',
            'depreciation' => 'required|numeric|between:0,100',
            'net_income' => 'required|min:1',
            'tax' => 'required|numeric|between:0,100',
            'net_cashflow' => 'required|min:1',
            'project_id' => 'required|exists:projects,id',
        ];
    }
}
