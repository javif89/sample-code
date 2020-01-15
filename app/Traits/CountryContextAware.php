<?php

namespace App\Traits;

use App\CountryContext;

trait CountryContextAware
{

    public function scopeForCountry($query, CountryContext $countryContext)
    {
        return $query->where('country_code', $countryContext->get())
            ->where('lang_code', $countryContext->getLang());
    }
}