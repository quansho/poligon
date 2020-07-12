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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


//Route::get('/admin-login', 'Auth\AuthController@adminLoginIndex')->name('admin.login');


Route::get('/contact', 'ContactController@index')->name('contact');
Route::get('/about', 'AboutController@index')->name('about');

$adminGroup = [ 'namespace' => 'admin',
    'prefix' => 'admin',
    'middleware' => 'is.admin'];
Route::group($adminGroup, function () {
    $methods = ['index', 'edit', 'store', 'update', 'create', 'destroy'];

    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::resource('/locations', 'LocationController')->only($methods)->names('LocationsRest.admin');
    Route::resource('/categories', 'CategoryController')->only($methods)->names('CategoryRest.admin');
    Route::resource('/blogpost', 'PostController')->names('PostRest.admin');
});

Route::group(['namespace' => 'blog',  ], function () {

    Route::resource('/discovery', 'PostController')->names('PostGuest');


});


Route::group(['prefix' => 'foundamentals'], function () {
    Route::get('property-container', 'FoundamentalPatternsController@PropertyContainer')->name('property.container');
    Route::get('delegation', 'FoundamentalPatternsController@Delegation')->name('delegation');
    Route::get('event-channel', 'FoundamentalPatternsController@EventChannel')->name('event.channel');
    Route::get('interface-pattern', 'FoundamentalPatternsController@InterfacePattern')->name('interface');
});
