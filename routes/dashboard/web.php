<?php


Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
	Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function(){

       
              Route::get('/index','DashboardController@index')->name('index');

               //user Route
               Route::resource('users','UserController')->except('show');

                //category Route
                Route::resource('categories','CategoryController')->except('show');
                //product Route
                Route::resource('products','ProductController')->except('show');
               //client Route
               Route::resource('clients','ClientController')->except('show');
               Route::resource('clients.orders','Client\OrderController')->except('show');
       });

	
});







