<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class timeBetween implements Rule
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
        $pickupDate = Carbon::parse($value);
        $pickupTime = Carbon::createFromTime($pickupDate->hour , $pickupDate->minute , $pickupDate->second);
        //when the reservation is open
        $earliestTime = Carbon::createFromTimeString('00:00:00');
        $lastTime = Carbon::createFromTimeString('23:59:59');
        return $pickupTime->between($earliestTime,$lastTime)? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'please chose the time between 00:00-23:59';
    }
}
