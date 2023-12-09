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
// Auth::routes();

// Route::get('php-info', function () {
//     phpinfo();
// });

//clear cache
// Route::get('/clear-cache', function () {
//     Artisan::call('cache:clear');
//     Artisan::call('view:clear');
//     Artisan::call('route:clear');
//     Artisan::call('clear-compiled');
//     Artisan::call('config:clear');
//     Artisan::call('config:cache');
//     return "Cache is cleared";
// });

Route::get('/', function () {
    return view('login');
})->name('dashboard.index');

Route::get('login', 'UserController@index')->name('login');
Route::post('proses.login', 'UserController@ProsesLogin')->name('proses.login');

Route::group(['middleware' => ['auth']], function(){
    // Route::group(['middleware' => ['cek_login:admin']], function(){
        Route::get('dashboard', 'FormController@index')->name('dashboard');
        
        // Slider
        Route::get('slider', 'FormController@slider')->name('slider');
        Route::post('saveDataSlider', 'FormController@saveInputDataSlider')->name('saveDataSlider');
        Route::get('getDataEdit/{idData}', 'FormController@getDataEdit')->name('getDataEdit');
        Route::post('UpdateDataSlider', 'FormController@UpdateDataSlider')->name('UpdateDataSlider');
        // End Slider

        // Client
        Route::get('client', 'FormController@client')->name('client');
        Route::post('saveDataClient', 'FormController@saveDataClient')->name('saveDataClient');
        Route::get('getDataEditClient/{idData}', 'FormController@getDataEditClient')->name('getDataEditClient');
        Route::post('UpdateDataClient', 'FormController@UpdateDataClient')->name('UpdateDataClient');
        // End Client
        
        // About
        Route::get('about', 'FormController@About')->name('about');
        Route::post('updateDataAbout', 'FormController@UpdateDataAbout')->name('updateDataAbout');
        Route::get('getDataAboutEdit/{idData}', 'FormController@getDataAboutEdit')->name('getDataEdit');
        // End About

        // Gallery
        Route::get('gallery', 'FormController@gallery')->name('gallery');
        Route::post('saveInputDataGallery', 'FormController@saveInputDataGallery')->name('saveInputDataGallery');
        Route::get('getDataEditGallery/{idData}', 'FormController@getDataEditGallery')->name('getDataEditGallery');
        Route::post('updateDataGallery', 'FormController@updateDataGallery')->name('updateDataGallery');
        // End Gallery

        // Our team
        Route::get('our-team', 'FormController@ourteam')->name('our-team');
        Route::get('getDataEditOurTeam/{idData}', 'FormController@getDataEditOurTeam')->name('getDataEditOurTeam');
        Route::post('updateDataOurTeam', 'FormController@updateDataOurTeam')->name('updateDataOurTeam');
        Route::post('saveDataTeam', 'FormController@saveInputDataTeam')->name('saveDataTeam');
        // End Our team

        // Category
        Route::get('category', 'FormController@category')->name('category');
        Route::post('saveDataCategory', 'FormController@saveDataCategory')->name('saveDataCategory');
        Route::get('getDataEditCategory/{idData}', 'FormController@getDataEditCategory')->name('getDataEditCategory');
        Route::post('updateDataCategory', 'FormController@updateDataCategory')->name('updateDataCategory');
        // End Category

        // Product
        Route::get('product', 'FormController@product')->name('product');
        Route::post('saveDataProduct', 'FormController@saveDataProduct')->name('saveDataProduct');
        Route::get('getDataEditProduct/{idData}', 'FormController@getDataEditProduct')->name('getDataEditProduct');
        Route::post('UpdateDataProduct', 'FormController@UpdateDataProduct')->name('UpdateDataProduct');
        // End Product

        // Contact
        Route::get('contact', 'FormController@Contact')->name('contact');
        Route::post('updateDataContact', 'FormController@updateDataContact')->name('updateDataContact');
        Route::get('getDataEditContact/{idData}', 'FormController@getDataEditContact')->name('getDataContact');
        // End Contact

        Route::get('deleteDataSlider/{idData}', 'FormController@deleteDataSlider')->name('deleteDataSlider');
        Route::get('deleteDataGallery/{idData}', 'FormController@deleteDataGallery')->name('deleteDataGallery');
        Route::get('deleteDataTeam/{idData}', 'FormController@deleteDataTeam')->name('deleteDataTeam');
        Route::get('deleteDataCategory/{idData}', 'FormController@deleteDataCategory')->name('deleteDataCategory');
        Route::get('deleteDataProduct/{idData}', 'FormController@deleteDataProduct')->name('deleteDataProduct');
        Route::get('deleteDataClient/{idData}', 'FormController@deleteDataClient')->name('deleteDataClient');

        Route::get('user.management', 'FormController@userManagement')->name('user.management');
        Route::post('updateDataUser', 'FormController@updateDataUser')->name('updateDataUser');
        Route::post('logout', 'UserController@logout')->name('logout');

        Route::post('updateDataSEO', 'FormController@updateDataSEO')->name('updateDataSEO');
        Route::get('DataSEO', 'FormController@DataSEO')->name('DataSEO');
    // });
});





// Route::get('/', function () {
//     return view('login.login');
// })->name('login.index');

// Route::get('dashboard', '')->name('dashboard');
