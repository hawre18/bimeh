<?php

use Illuminate\Support\Facades\Auth;
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
Auth::routes();
Route::group(['prefix' => 'api','namespace'=>'App\Http\Controllers\Admin'],function () {
    Route::get('/province','AddressController@getAllProvince');
    Route::get('/customer','SellController@getAllCustomer');
    Route::get('/services','SellController@getAllService');
    Route::get('/planes/{id}','OrderController@getAllPlane');
    Route::get('/plane','WalletController@getPlane');
    Route::get('/wallets/{id}','OrderController@getWallet');
    Route::get('/cities/{provinceId}','AddressController@getAllCities');
    Route::get('/wallet/{customerId}','.\..\Doctor\SellController@getWallet');
    Route::post('photos/uploadPlane','ImageController@upload')->name('photosPlane.upload');
    Route::post('photosLogo/upload','ImageController@uploadLogo')->name('photosLogo.upload');
    Route::post('photoType/upload','ImageController@uploadType')->name('photoType.upload');
    Route::post('photosSession/upload','ImageController@uploadsession')->name('photoSession.upload');
});
Route::group(['prefix' => 'apiDoctor','namespace'=>'App\Http\Controllers\Doctor'],function () {
    Route::get('/wallet/{customerId}','SellController@getWallet');
    Route::get('/servicewhere','SellController@getService');
});
Route::group(['prefix' => 'admin','middleware'=>['auth:web','checkAdmin'],'namespace'=>'App\Http\Controllers\Admin'],function (){
    Route::resource('customer','CustomerController')->middleware('can:customer-crud');
    Route::resource('company','CompanyController')->middleware('can:customer-crud');
    Route::resource('employ','EmployController')->middleware('can:customer-crud');
    Route::get('customer/address/create/{customerId}','CustomerController@address')->name('create.address')->middleware('can:customer-crud');
    Route::get('home','HomeController@index')->name('admin.home');
    Route::get('address','AddressController@index')->name('index.address')->middleware('can:address-crud');
    Route::post('customer/address/store/{customerId}','AddressController@store')->name('addresses.store')->middleware('can:address-crud');
    Route::get('address.destroy/{id}','AddressController@destroy')->name('address.destroy')->middleware('can:address-crud');
    Route::resource('plane','PlaneController')->middleware('can:plane-crud');
    Route::resource('type','TypeController')->middleware('can:customer-crud');
    Route::resource('session','sessionController')->middleware('can:plane-crud');
    Route::resource('role','RoleController')->middleware('can:role-crud');
    Route::get('order/pay/{orderId}','OrderController@pay')->name('order.pay')->middleware('can:role-crud');
    Route::resource('order','OrderController')->middleware('can:role-crud');
    Route::resource('permission','PermissionController')->middleware('can:permission-crud');
    Route::resource('level','LevelManageController',['parameters'=> ['level'=>'user']]);
    Route::resource('services','ServiceController')->middleware('can:service-crud');
    Route::resource('doctors','DoctorController')->middleware('can:doctor-crud');
    Route::resource('information','InformationController')->middleware('can:doctor-crud');
    Route::patch('doctors/active/{id}','DoctorController@status')->name('doctors.active')->middleware('can:doctor-crud');
    Route::get('wallet/{customerId}/{typePlane}','WalletController@charge')->name('wallet.charge')->middleware('can:wallet-crud');
    Route::put('wallet/charging/{customerId}/{typePlane}','WalletController@charging')->name('wallet.charging')->middleware('can:wallet-crud');
    Route::get('/logout','Auth\LoginController@userLogout')->name('user.logout');
    Route::get('sells/index','SellController@index')->name('sellsa.index');
    Route::resource('wallets','WalletController');
    Route::get('/sellpdf/{id}','SellController@createPDF')->name('sells.pdf');
    Route::group(['prefix'=>'user'],function (){
        Route::resource('users','UserController')->middleware('can:user-crud');

    });
});

Route::group(['namespace'=>'App\Http\Controllers\User'],function (){
    Route::get('/','HomeController@home')->name('/');
    Route::get('contact','HomeController@contact')->name('contact');
    Route::get('about','HomeController@about')->name('about');
    Route::get('plane/show/{id}','HomeController@planeShow')->name('uPlane.show');
    Route::get('session/show/{id}','HomeController@sessionShow')->name('uSession.show');
    Route::get('type/show/{id}','HomeController@typeShow')->name('uType.show');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

