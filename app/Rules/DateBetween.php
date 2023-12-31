<?php

namespace App\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DateBetween implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
    }

    public function passes($attribute, $value): bool
    {
        $pickupDate = Carbon::parse($value);
        $lasteDate = Carbon::now()->addWeek();
        return $pickupDate >= now() && $value <= $lasteDate;
    }

    public function message()
    {
        return "Choisire une date comprise entre aujourdhui et une semaine apres";
    }
}
