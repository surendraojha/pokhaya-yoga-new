<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use ReCaptcha\ReCaptcha;

class Captcha implements Rule
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
        $recaptcha = new Recaptcha('6Lf3NP8ZAAAAAGObhdT06b5dFs-OHxWY-4Yk10GV');
        $response = $recaptcha->verify($value, $_SERVER['REMOTE_ADDR']);

        if ($response->isSuccess()) {
            // return $response->isSuccess();
        } else {
        //     $errors = $response->getErrorCodes();

        //     return $errors;
        // }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
