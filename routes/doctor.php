<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Doctor\Auth\LoginController;


Route::namespace('App\Http\Controllers\Doctor\Auth')->prefix('doctors')->group(function(){

    Route::middleware('guest:doctor')->group(function(){
        //login route
        Route::get('/login','LoginController@login')->name('login');
        Route::post('/login','LoginController@processLogin')->name('doctors.login');
    });



});
Route::namespace('App\Http\Controllers\Doctor')->prefix('doctors')->middleware('auth:doctor')->group(function(){
    Route::get('sells/create','SellController@create')->name('sells.create');
    Route::post('selling','SellController@store');
    Route::get('sells/index','SellController@index')->name('sells.index');
    Route::get('home','DoctorController@home')->name('doctors.home');
    Route::get('sells/show/{idSell}/{idCustomer}','SellController@show')->name('sell.show');
    Route::get('sells/pay/{sellId}/{customerId}','SellController@payment')->name('sell.pay');
    Route::get('/logout','Auth\LoginController@doctorLogout')->name('doctor.logout');

});
