<?php

namespace App\Http\Middleware;

use App\Services\LocaleService;
use Illuminate\Http\Request;
use Closure;

class CountryMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('country')) {
            return redirect("/" . session('country'));
        } else {
            // Uncomment IP to test       
            // $countryInfo = geoip()->getLocation('2.16.145.255'); // Netherlands
            // $countryInfo = geoip()->getLocation('27.116.59.255'); // Afghanistan
            $countryInfo = geoip()->getLocation($request->ip()); // User's IP
            $countryCode = $countryInfo->iso_code;
            $country = LocaleService::getCountry($countryCode);

            if ($country !== null) {
                return redirect("/$countryCode");
            } else {
                return redirect("/US");
            }
        }
    }
}
