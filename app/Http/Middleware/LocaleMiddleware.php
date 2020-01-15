<?php

namespace App\Http\Middleware;

use App\Country;
use App\Language;
use App\Promotion;
use App\Region;
use App\Services\LocaleService;
use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\View;

class LocaleMiddleware
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
        // If a country was passed, redirect to that country
        if ($request->has('c')) {
            $segments = $request->segments();
            $segments[0] = strtoupper($request->input('c')); // Segment 0 should always be the country
            $url = join("/", $segments);
            $country = LocaleService::getCountry($segments[0]);
            session([
                'country' => $segments[0],
                'locale' => $country->language->code
            ]);
            return redirect($url);
        }

        $countryCode = $request->route('country');
        $country = LocaleService::getCountry($countryCode);
        if ($country !== null) {
            // If there's a different country from session, update session
            $sessionCountry = session('country');
            if ($sessionCountry !== $countryCode) {
                session(['country' => $countryCode]);
            }
            if ($request->has('lang')) {
                LocaleService::setLocale($request->input('lang'), $countryCode);
            } elseif (session()->has('locale')) {
                // If there's a different language from the session, update the session
                LocaleService::setLocale(session('locale'), $countryCode);
            } else {
                LocaleService::setLocale($country->language->code, $countryCode);
            }

            $data = [
                'promotion' => Promotion::where('country_code', $countryCode)->latest()->first(),
                'languages' => Language::enabled()->get(),
                'countries' => Country::enabled()->get(),
                'regions' => Region::all(),
                'active_country' => $country
            ];

            \View::share('localedata', $data);
        } else {
            return $next($request);
            //return redirect(route('get-country'));
        }
        return $next($request);
    }
    
}
