<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CheckCollateral;
use App\Rules\CheckOnProgressloan;

class StoreLoanRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'amount' => ['required', 'min:1000', 'numeric', new CheckCollateral, new CheckOnProgressLoan],
        ];
    }

    public function messages()
    {
        return [
            'amount.min' => 'The amount must be at least 1000 TSH.',
            'amount.required' => 'The Loan amount field is required.',
        ];
    }
}


