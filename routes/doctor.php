<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Doctor\Auth\LoginController;


Route::namespace('App\Http\Controllers\Doctor\Auth')->prefix('doctors')->group(function(){

    Route::middleware('guest:doctor')->group(function(){
        //login route
        Route::get('/login','LoginController@login')->name('login');
        Route::post('/login','LoginController@processLogin');
    });



});
Route::namespace('App\Http\Controllers\Doctor')->prefix('doctors')->middleware('auth:doctor')->group(function(){
    Route::get('sells/create','SellController@create')->name('sells.create');
    Route::post('selling','SellController@store');
    Route::get('sells/index','SellController@index')->name('sells.index');
    Route::get('sells/payment','SellController@payment')->name('sell.pay');
    Route::get('home','DoctorController@home')->name('doctors.home');
    Route::post('/logout',function(){
        Auth::guard('doctor')->logout();
        return redirect()->action([
            LoginController::class,
            'login'
        ]);
    })->name('logout');

});
