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

$adminGroup = [
                'namespace'     => 'admin',
                'prefix'        => 'admin',
                'middleware'    => 'is.admin'
              ];


Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


//Route::get('/admin-login', 'Auth\AuthController@adminLoginIndex')->name('admin.login');


Route::get('/contact', 'ContactController@index')->name('contact');
Route::get('/about', 'AboutController@index')->name('about');


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
    Route::get('property-container', 'FundamentalPatternsController@PropertyContainer')->name('property.container');
    Route::get('delegation', 'FundamentalPatternsController@Delegation')->name('delegation');
    Route::get('event-channel', 'FundamentalPatternsController@EventChannel')->name('event.channel');
    Route::get('interface-pattern', 'FundamentalPatternsController@InterfacePattern')->name('interface');
});

Route::group(['prefix' => 'creational'], function () {
    Route::get('abstract-factory', 'CreationalPatternsController@AbstractFactory')->name('abstract.factory');
});


