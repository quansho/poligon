<?php


namespace App\Http;


class ClassForExamples
{

//    Redirect to controller with params
    public function redirect($value){
        return redirect()->action('SomeController@method',    ['param' => $value]);
    }


    //Группа маршрутов внутри группы
    //Route::group(['prefix' => 'account', 'as' => 'account.'], function() {
    //    Route::get('login', 'AccountController@login');
    //    Route::get('register', 'AccountController@register');
    //    Route::group(['middleware' => 'auth'], function() {
    //        Route::get('edit', 'AccountController@edit');
    //    });
    //});



}
