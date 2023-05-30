<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Member;

class CheckCollateral implements Rule
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
        $requestedAmount = $value;
        $member = Member::where('user_id', auth()->user()->id)->first();
        
        // Check if the member's balance is not 0 and is greater than or equal to the requested amount
        return $member->balance_amount != 0 && $member->balance_amount >= $requestedAmount;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Your Balance amount is insufficient for this loan.';
    }
}
