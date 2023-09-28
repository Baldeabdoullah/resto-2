<?php

namespace App\Rules;

use Closure;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\ValidationRule;

class TimeBetween implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }

    public function passes($attribute, $value): bool
    {
        $pickupDate = Carbon::parse($value);
        $pickupTime = Carbon::createFromTime($pickupDate->hour, $pickupDate->minute, $pickupDate->second);
        // les heures d'ouvertures
        $earliesteTime = Carbon::createFromTimeString('09:00:00');
        $lastTime = Carbon::createFromTimeString('22:00:00');
        return  $pickupTime->between($earliesteTime, $lastTime) ? true : false;
    }

    public function message()
    {
        return "Choisire une date comprise entre 9H et 22H";
    }
}
