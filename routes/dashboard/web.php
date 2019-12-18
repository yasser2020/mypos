<?php
Route::prefix('dashboard')->name('dashboard.')->group(function(){

       Route::get('/index','DashboardController@index')->name('index');
    //    if you add in name('dashboard.name') that will release an error 
    //    because that will transilt as dashboard.dashboard.index
     
});