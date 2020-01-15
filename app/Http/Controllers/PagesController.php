<?php

namespace App\Http\Controllers;

use App\Career;
use App\CareerCategory;
use App\Country;
use App\CountryContext;
use App\Customer;
use App\Event;
use App\EventMedia;
use App\EventType;
use App\Language;
use App\Product;
use App\ProductCategory;
use App\ProductMedia;
use App\Promotion;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PagesController extends Controller
{
    public function viewProducts()
    {
        $pageTitle = 'PRODUCTS';
        
        $categories = ProductCategory::with('products')->orderBy('path')->get();

        // Organize the categories by hirerarchy
        $cats = collect($categories);
        $parentCategories = $cats->where('is_subcategory', false);
        
        return view('view.products')->with(compact('pageTitle', 'categories', 'parentCategories'));
    }

    public function viewPromotions(CountryContext $countryContext)
    {
        $pageTitle = 'PROMOTIONS';

        $promotions = Promotion::where('country_code', $countryContext->get())
                ->where('lang_code', $countryContext->getLang())
                    ->get();

        return view('view.promotions')->with(compact('pageTitle', 'promotions'));
    }

    public function viewTradeShows(CountryContext $countryContext)
    {
        $pageTitle = 'TRADE SHOWS';

        $events = Event::tradeShows()->get();

        $eventType  =  EventType::where('name', 'TRADE SHOW')->first();

        $regions = Region::all();
        
        return view('view.events')->with(compact('pageTitle', 'events', 'eventType', 'regions'));
    }

    public function viewEvents(CountryContext $countryContext)
    {
        $pageTitle = 'EVENTS';

        $events = Event::general()->get();

        $eventType  =  EventType::where('name', 'General')->first();

        $regions = Region::all();

        return view('view.events')->with(compact('pageTitle', 'events', 'eventType', 'regions'));
    }

    public function viewDemos()
    {
        $pageTitle = 'VIRTUAL DEMOS';

        $events = Event::demos()->get();

        $languages = getEnabledLanguages();

        $productsArr = Product::all();

        $eventType  =  EventType::where('name', 'VIRTUAL DEMO')->first();

        $products = $productsArr->where('active', 1);

        // return var_dump($events);

        return view('view.events')->with(compact('pageTitle', 'events', 'products', 'languages', 'eventType'));
    }

    public function viewCareers(){
        $pageTitle = 'CAREERS';

        $categories = CareerCategory::all();

        return view('view.careers')->with(compact('pageTitle', 'categories'));
    }
  
    public function viewCustomers(){
        $customers = Customer::all();

        return view("view.customers")->with(compact('customers'));
    }

    public function manageUsers()
    {
        $pageTitle = 'users';

        return view('manage.users')->with(compact('pageTitle'));
    }

    public function manageLocaleSettings()
    {
        $pageTitle = 'Locale Settings';

        //$allLanguages = Language::all()->groupBy('enabled');
        $languages = getEnabledLanguages();
        $disabledLanguages = getDisabledLanguages();

        $countries = Country::getForList(1);
        $disabledCountries = Country::getForList(0);

        $regions = Region::all();

        return view('manage.locale-settings')->with(compact('pageTitle', 'languages', 'disabledLanguages','countries', 'disabledCountries', 'regions'));
    }
    
    public function editProduct($id, CountryContext $countryContext)
    {
        $product = Product::find($id);
        $categories = ProductCategory::with('products')->orderBy('path')->get();

        // Get default content and media
        $default_content = collect($product->content)->where('country_code', 'DEFAULT');
        $default_media = collect($product->media)->where('country_code', 'DEFAULT');

        // use only related to current country content and media
        $product->content = $countryContext->filterCountryItems(collect($product->content));
        $product->media = $countryContext->filterCountryItems(collect($product->media));

        //$regions = $client->getRequest('region');
        //$languages = getEnabledLanguages();
        \View::share('resource_name', 'product');
        return view('product.edit')->with(compact('product', 'categories', 'default_content', 'default_media'));
    }

    public function editPromotion($id)
    {
        $promotion = Promotion::find($id);

        $categories = ProductCategory::all();

        $promotion_product_ids = collect($promotion->products)->pluck('id')->toArray();

        return view('promotion.edit')->with(compact('promotion', 'categories', 'promotion_product_ids'));
    }

    public function editEvent($id)
    {
        \DB::listen(function ($sql) {
            Log::info(json_encode($sql));
        });
        $event = Event::with('type')->find($id);
        
        $media = $event->media;
        $eventTypes = EventType::all();

        $regions = Region::all();
        $languages = getEnabledLanguages();

        $pageTitle = $event->name;
        $productsArr = Product::all();
        
        $products = [];
        foreach ($productsArr->where('active', 1) as $p) {
            $products[] = $p;
        }
        
        return view('event.edit')->with(compact('pageTitle', 'event', 'media', 'eventTypes', 'regions', 'languages', 'products'));
    }

    public function editCareer( $id){
        $career = Career::find($id);
        $categories = CareerCategory::all();

        // return var_dump($career);

        return view('career.edit')->with(compact('career', 'categories'));

    }

    public function editCountry( $id)
    {
        $country = Country::find($id);
        $regions = Region::all();
        $languages = getEnabledLanguages();
        $disabledLanguages = getDisabledLanguages();

        return view('country.edit')->with(compact('country', 'regions', 'languages', 'disabledLanguages'));
    }

    public function viewDistributorFiles()
    {
        $parentCategories =  ProductCategory::with('products')->where('is_subcategory', false)->get();

        $brandingFiles = ProductMedia::branding()->get();

        return view('view.distributor-files')->with(compact( 'parentCategories', 'brandingFiles'));
    }

    public function viewBrandingAssets()
    {
        $brandingFiles = ProductMedia::branding()->get();

        return view('view.branding-assets')->with(compact(  'brandingFiles'));
    }
}
