<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class OverlappingRequestRule implements Rule
{
    protected $request;
    protected $message;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
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
        if ($this->request) {
            $this->message = "An existing request has been found for '" . $this->request->doc_title . "', please select another document.";
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
        return $this->message;
    }
}
