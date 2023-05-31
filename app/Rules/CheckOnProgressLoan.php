<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Loan;

class CheckOnProgressLoan implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $loan = Loan::where('status', 'ON-PROGRESS')->get();
        
        // Check if the member's has on progress loan
        return $loan->isEmpty();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Sorry You have loan on progress.';
    }
}
