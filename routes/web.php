<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('search', 'SearchController@front')->name('search-front');

Route::prefix('{country}')->group(function () {
    Route::middleware(['locale'])->group(function () {
        /**
         * Here is where we will put all the routes so that they're contained in the country and locale system
         */
        Route::get('/', 'MainSiteController@getCountryHomepage')->name('website-home');
        //    Route::get('/', function () {
        //      return view('partials.locale-select');
        //    });
        //todo: Need to figure out how to get machines and how to structure the view files
        //      Route::get('', '');

        Route::get('machine/{slug}', 'MainSiteController@getMachinePage')->name('machine-page');
        Route::get('software/chroma', 'MainSiteController@getChromaPage')->name('chroma-page');
        Route::get('software/chroma/download', 'MainSiteController@getChromaDownloadPage')->name('chroma-download-page');

        // Minor static pages
        Route::get('contact-us', 'MainSiteController@getContactUsPage')->name('contact-page');
        Route::get('virtual-demo', 'MainSiteController@getVirtualDemoPage')->name('virtual-demo-page');
        Route::get('tech-support', 'MainSiteController@getTechSupportPage')->name('tech-support-page');
        Route::get('financing', 'MainSiteController@getFinancingPage')->name('financing-page');
        Route::get('about', 'MainSiteController@getAboutPage')->name('about-page');
        Route::get('reviews', 'MainSiteController@getReviewsPage')->name('reviews-page');
        Route::get('training', 'MainSiteController@getTrainingPage')->name('training-page');
        Route::get('press', 'MainSiteController@getPressPage')->name('press-page');

        Route::get('terms-of-service', 'MainSiteController@getTOSPage')->name('terms-of-service-page');
        Route::get('privacy-policy', 'MainSiteController@getPrivacyPolicyPage')->name('privacy-policy-page');
        Route::get('cookie-policy', 'MainSiteController@getCookiePolicyPage')->name('cookie-policy-page');
        Route::get('warranty', 'MainSiteController@getWarrantyPage')->name('warranty-page');
        Route::get('thank-you', 'MainSiteController@getThankYouPage')->name('thank-you-page');

        // Compare
        Route::prefix('product-category')->group(function(){
            Route::get('/{category}', 'MainSiteController@getCategoryOverviewPage')->name('category-overview-page');
            Route::get('/{category}/compare', 'MainSiteController@categoryCompare')->name('category-compare-page');
            
        });

        Route::prefix('events')->group(function(){
            Route::get('/', 'MainSiteController@getEventsPage')->name('events');
            Route::get('/view/{slug}', 'MainSiteController@getEventPage')->name('event-page');
            Route::get('/tradeshows', 'MainSiteController@getTradeShowsPage')->name('tradeshows');
            Route::get('/tradeshows/{slug}', 'MainSiteController@getTradeShowPage')->name('tradeshow-page');
        });

        Route::post('/ticket-submit', 'TechSupportController@submitTicket')->name('submit-ticket');

    });
});

Route::get('/', 'MainSiteController@index')->name('locale-select');
Route::post('/redirect-to-locale', 'MainSiteController@redirectToLocale')->name('redirect-to-locale');
Route::post('set-country-context', function (\Illuminate\Http\Request $request) {
    app('CountryContext')->set($request->get('code'), $request->get('lang_code'));
})->middleware(['auth']);