<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShareRequest extends FormRequest
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
            'amount' => ['required', 'min:1', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'amount.min' => 'The Minimum share to buy is 1.',
            'amount.required' => 'The Share amount field is required.',
        ];
    }
}
