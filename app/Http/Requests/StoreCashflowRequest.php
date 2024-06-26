<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCashflowRequest extends FormRequest
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
            'year' => 'required|numeric|between:1,' . date("Y"),
            'production' => 'required|min:1',
            'income' => 'required|min:1',
            'opex' => 'required|min:1',
            'taxable_income' => 'required|min:1',
            'net_cashflow' => 'required|min:1',
            'project_id' => 'required|exists:projects,id',  
        ];
    }
}
