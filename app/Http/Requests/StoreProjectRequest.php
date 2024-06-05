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
            'name' => 'required|min:5',
            'site_manager' => 'required|min:5',
            'invest_capital' => 'required',
            'invest_noncapital' => 'required',
            'user_id' => 'required|exists:users,id',
            'depreciation' => 'required|numeric|between:0,100',
            'tax' => 'required|numeric|between:0,100',
        ];
    }
}
