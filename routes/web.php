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

Route::group(['prefix' => 'api','namespace'=>'App\Http\Controllers\Admin'],function () {
    Route::get('/province','AddressController@getAllProvince');
    Route::get('/customer','SellController@getAllCustomer');
    Route::get('/services','SellController@getAllService');
    Route::get('/cities/{provinceId}','AddressController@getAllCities');
});
//,'middleware'=>['auth:web','checkAdmin']
Route::group(['prefix' => 'admin','namespace'=>'App\Http\Controllers\Admin'],function (){
    Route::resource('customer','CustomerController');
    Route::get('customer/address/{id}','CustomerController@address')->name('address.customer');
    Route::resource('address','AddressController');
    Route::get('address.delete/{id}','AddressController@delete')->name('address.delete');
    Route::resource('plane','PlaneController');
    Route::get('plane.delete/{id}','PlaneController@delete')->name('plane.delete');
    Route::resource('role','RoleController');
    Route::get('role.delete/{id}','RoleController@delete')->name('role.delete');
    Route::resource('permission','PermissionController');
    Route::get('permission.delete/{id}','PermissionController@delete')->name('permission.delete');
    Route::resource('level','LevelManageController',['parameters'=> ['level'=>'user']]);
    Route::resource('services','ServiceController');
    Route::get('services.delete/{id}','ServiceController@delete')->name('services.delete');
    Route::resource('doctors','DoctorController');
    Route::get('doctors.delete/{id}','DoctorController@delete')->name('doctor.delete');
    Route::get('sells/create','SellController@create')->name('sells.create');
    Route::post('doctors/selling','SellController@store');
    Route::get('wallet/{id}','WalletController@charge')->name('wallet.charge');
    Route::patch('wallet/charging','WalletController@charging');
    Route::group(['prefix'=>'users'],function (){
        Route::get('/','UserController@index');
        Route::post('/{user}/delete','UserController@delete')->name('users.delete');

    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
