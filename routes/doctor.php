<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Doctor\Auth\LoginController;


Route::namespace('App\Http\Controllers\Doctor\Auth')->prefix('doctors')->group(function(){

    Route::middleware('guest:doctor')->group(function(){
        //login route
        Route::get('/logins','LoginController@login')->name('logins');
        Route::post('/logins','LoginController@processLogin')->name('doctors.logins');
    });



});
Route::namespace('App\Http\Controllers\Doctor')->prefix('doctors')->middleware('auth:doctor')->group(function(){
    Route::get('sells/create','SellController@create')->name('sells.create');
    Route::post('selling','SellController@store');
    Route::get('sells/index','SellController@index')->name('sells.index');
    Route::post('/sell/destroy','SellController@destroy')->name('sell.destroy');
    Route::get('dashboard','DoctorController@home')->name('doctor.dashboard');
    Route::get('home','DoctorController@home')->name('doctors.home');
    Route::get('sells/show/{idSell}/{idCustomer}','SellController@show')->name('sell.show');
    Route::patch('sells/pay/{id}','SellController@payment')->name('sell.pay');
    Route::get('/logout','Auth\LoginController@doctorLogout')->name('doctors.logout');
    Route::get('/sellpdf/{id}','SellController@createPDF')->name('sell.pdf');

});
