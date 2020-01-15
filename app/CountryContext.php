<?php

namespace App;


use Illuminate\Support\Collection;
//use Ricoma\ContentServiceClient\ContentServiceClient;

class CountryContext
{

    const DEFAULT_COUNTRY = 'US';
    const DEFAULT_LANG = 'en';


    public function set($countryCode, $langCode = null)
    {
        session()->put('country_context', $countryCode);
        if (!$langCode) {
            $langCode = Country::where('code', $countryCode)->first()->defaultLanguage->code;
        }

        session()->put('country_context_lang', $langCode);
    }

    public function get()
    {
        return session()->get('country_context', self::DEFAULT_COUNTRY);
    }

    public function getLang()
    {
        return session()->get('country_context_lang', self::DEFAULT_LANG);
    }

    public function getCountryObject()
    {
        return Country::where('code', $this->get())->first();
    }

    public function getAvailableCountries()
    {
        $user = \Auth::user();
        $allCountries = Country::setEagerLoads([])->enabled()->get();
        // all countries list is only for super admin
        if ($user) {
            if ($user->can('superadmin')) {
                return $allCountries ?? collect([]);
            } else {
                if ($allCountries->count()) {
                    // for country level admins we show only attached country
                    return Country::where('code', $user->country_code)->get();
                }
                return collect([]);
            }
        } else {
            return collect([]);
        }
    }

    public function filterCountryItems(Collection $collection, $countryCodeAttribute = 'country_code')
    {
        $currentCountryCode = $this->get();
        return $collection->filter(function ($item) use ($countryCodeAttribute, $currentCountryCode) {
            if (is_array($item)) {
                return $item[$countryCodeAttribute] === $currentCountryCode;
            } else {
                return $item->$countryCodeAttribute === $currentCountryCode;
            }
        });
    }
}