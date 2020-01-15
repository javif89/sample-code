<?php

namespace App\Http\Controllers;

use App\Country;
use App\Event;
use App\EventType;
use App\Language;
use App\Product;
use App\ProductCategory;
use App\Region;
use App\Services\EventService;
use App\Services\LocaleService;
use App\Services\ProductCategoryService;
use App\Services\ProductService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MainSiteController extends Controller
{

    public function index(Request $request)
    {
        if (session()->has('country')) {
            return redirect(route('website-home', ['country'=>session('country')]));
        } else {
            // Uncomment IP to test       
            // $countryInfo = geoip()->getLocation('2.16.145.255'); // Netherlands
            // $countryInfo = geoip()->getLocation('27.116.59.255'); // Afghanistan
            $countryInfo = geoip()->getLocation($request->ip()); // User's IP
            $countryCode = $countryInfo->iso_code;
            $country = LocaleService::getCountry($countryCode);

            if ($countryCode == 'US') {
                return redirect("/US");
            }
        }
        $countries = Country::enabled()->with('languages')->get();
        // Detect the user's country to preselect on the dropdown
        $current_country_code = $countryInfo->iso_code;
        // dd($current_country_code);
        // $current_lang = $current_country_code ? $countries->where('code', strtolower($current_country_code))->first()->language->code : 'en';
        $current_lang = 'en';
        return view('website.location-select-page')->with(compact('countries', 'current_country_code', 'current_lang'));
    }

    public function redirectToLocale(Request $request)
    {
        $country = $request->input('country');
        $language = $request->input('language');

        return redirect("/$country?lang=$language");
    }

    public function getCountryHomepage(Request $request)
    {
        $country = $request->session()->get('country');

        return view()->first(["website.countries.$country.home", 'website.countries.default.home']);
    }

    public function getMachinePage($country, $slug)
    {
        $product = Product::whereSlug($slug)->first();

        abort_if(empty($product), 404);

        return view('website.product.machine')->with(compact('product'));
    }

    public function getChromaPage($country){
        return view('website.chroma.chroma');
    }

    public function getChromaDownloadPage($country)
    {
        return view('website.chroma.download');
    }

    public function getContactUsPage($country){
        return view('website.contactUs.contact');
    }

    public function getVirtualDemoPage($country){
        return view('website.virtual-demo.virtual-demo');
    }

    public function getTechSupportPage($country)
    {
        return view('website.tech-support.tech-support');
    }

    public function getFinancingPage($country)
    {
        return view('website.financing.financing');
    }

    public function getAboutPage($country)
    {
        return view('website.about.about');
    }
    
    public function getReviewsPage($country)
    {
        return view('website.reviews.reviews');
    }

    public function getTrainingPage($country)
    {
        return view('website.training.training');
    }

    public function getPressPage($country)
    {
        return view('website.press.press');
    }

    public function getPrivacyPolicyPage($country)
    {
        return view('website.plain.privacy-policy');
    }

    public function getTOSPage($country)
    {
        return view('website.plain.terms-of-service');
    }

    public function getWarrantyPage($country)
    {
        return view('website.plain.warranty');
    }

    public function getCookiePolicyPage($country)
    {
        return view('website.plain.cookie-policy');
    }

    public function getThankYouPage($country)
    {
        return view('website.thank-you.thank-you');
    }
    
    public function getCategoryOverviewPage($country, $category){
        $category = ProductCategory::where('slug', $category)->firstOrFail();
        $category_id = $category->id;

        $products['products'] = Product::whereHas('categories', function($q) use($category_id) {
            $q->where('product_categories.id', $category_id);
        })
        ->whereHas('countries', function($q) use($country) {
            $q->where('countries.code', $country);
        })->get();

        return view('website.embroidery.category')->with(compact('products', 'country', 'category'));
    }
    
    public function categoryCompare(Request $request, $country, $category)
    {
        $productNames =  explode(",", $request->get('compare'));

        $products = ProductService::compareProducts($productNames);
        // Log::info(print_r($products, true));
        $productCategory = ProductCategory::where('slug', $category)->first();
        return view('website.embroidery.compare')->with(compact('products', 'country', 'productCategory'));
    }

    public function getTradeShowsPage(Request $request){
        $region = $request->get('region');
        
        if(empty($region)) {
            $region = 'United States';
        }

        if($region == 'all') {
            $region = null;
        }

        $regions = Region::where('name', '!=', 'default')->get();
        $regionId = !empty($region) ? Region::where('name', $region)->firstOrFail()->id : '';

        $tradeshows = EventService::getEventsForPage($regionId, 'Trade Show');
        return view('website.events.tradeshows.overview')->with(compact('region', 'regions', 'tradeshows'));
    }

    public function getTradeShowPage($country, $slug)
    {
        $tradeshow = Event::tradeshows()->where('slug', $slug)->with('content')->firstOrFail();

        return view('website.events.tradeshows.tradeshow')->with(compact('tradeshow'));
    }

    public function getEventsPage(Request $request)
    {
        $region = $request->get('region');
        $regions = Region::where('name', '!=', 'default')->get();
        $regionId = !empty($region) ? Region::where('name', $region)->firstOrFail()->id : '';

        $tradeshows = EventService::getEventsForPage($regionId, 'General');
        return view('website.events.events.overview')->with(compact('region', 'regions', 'tradeshows'));
    }

    public function getEventPage($country, $slug)
    {
        // It'a actually a general event but we're reusing the same view
        $tradeshow = Event::general()->where('slug', $slug)->with('content')->firstOrFail();

        return view('website.events.tradeshows.tradeshow')->with(compact('tradeshow'));
    }
}
