<?php

use Illuminate\Support\Facades\Route;

Route::get('/','Auth\LoginController@showLoginForm')->name('main_home_page_login');

Auth::routes(['register' => false]);

//overall authentication of user by user table
Route::group(['middleware'=>'auth'], function () {

    //Admin Check middleware where if Role = admin so then the routes in this group can be accessed.
    //otherwise redirect to login page.
    Route::group(['middleware'=>'admin'], function () {
        Route::get('admindashboard', 'Admin\HomeController@index')->name('admin_dashboard');
    });
    //Admin Rights Ends Here. 

    //Principal Check middleware where if Role = admin so then the routes in this group can be accessed.
    //otherwise redirect to login page.
    Route::group(['middleware'=>'principal'], function () {
        Route::get('principaldashboard', 'Principal\HomeController@index')->name('principal_dashboard');
    });
    //Principal Rights Ends Here. 

    //Principal Check middleware where if Role = admin so then the routes in this group can be accessed.
    //otherwise redirect to login page.
    Route::group(['middleware'=>'assistant'], function () {
        Route::get('assistantdashboard', 'Assistant\HomeController@index')->name('assistant_dashboard');
    });
    //Assistant Rights Ends Here. 

});

// Route::group(['middleware' => ['role:admin', 'auth', 'verified']], function () use ($perms) {
//     Route::get('/dashboard', 'HomeController@index')->name('admin_dashboard');

// });

// Route::get('/home', function () {
//     echo "am logged in";
// })->name('home');
