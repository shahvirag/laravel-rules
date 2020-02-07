<?php

namespace Shahvirag\LaravelRules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class VerifyHash implements Rule
{
    /**
     * @var string
     */
    private $hashValue;

    /**
     * @var string
     */
    private $message;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($hash, $message = null)
    {
        $this->hashValue = $hash;
        $this->message = $message;
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
        return Hash::check($value, $this->hashValue);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        if (is_null($this->message)) {
            return 'The :attribute does not match.';
        }

        return $this->message;
    }
}
