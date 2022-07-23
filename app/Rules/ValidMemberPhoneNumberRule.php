<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidMemberPhoneNumberRule implements Rule
{

    protected $phoneNumber;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
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
        if (!$this->phoneNumber) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Phone number and member name does not match in our record.";
    }
}
