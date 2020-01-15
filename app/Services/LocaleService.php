<?php

namespace App\Services;

use App\Country;
use Illuminate\Support\Facades\App;

class LocaleService
{
    /**
     * Get country from content service.
     *
     * @param  $countryCode
     * @return mixed
     */
    public static function getCountry($countryCode)
    {
        $country = Country::where('code', '=', $countryCode)->first();
        
        return $country;
    }
    /**
     * Get country from user ip.
     *
     * @param  $ip
     * @return string
     */
    public static function getCountryFromIp($ip){
        $countryInfo = geoip()->getLocation($ip);

        return $countryInfo->iso_code;
    }

    /**
     * Set locale in session.
     *
     * @param  $country
     * @param  $countryCode
     * @return mixed
     */
    public static function setLocale($languageCode, $countryCode)
    {
        App::setLocale($languageCode);
        session([
            'locale' => strtoupper($languageCode),
            'country' => strtoupper($countryCode)
        ]);
        return true;
    }
}
