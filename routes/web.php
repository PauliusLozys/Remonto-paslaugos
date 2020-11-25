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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:user-manager')->group(function() {
    Route::resource('/users', 'UserController', ['except' => ['show', 'create', 'store']]);

});

Route::get('device/unrepaired','DevicesController@notRepaired' )->middleware('can:user-repairman')->name('device.notRepaired');
Route::post('device/unrepaired','DevicesController@searchNotRepaired' )->middleware('can:user-repairman')->name('device.searchNotRepaired');

Route::get('device/search','DevicesController@search' )->name('device.search');
Route::post('device/searc','DevicesController@searchDevice' )->name('device.searchDevice');
Route::post('device/search/{id}','DevicesController@searchUpdate' )->name('device.searchUpdate');

Route::get('device/statistics','DevicesController@statistics' )->middleware('can:user-manager')->name('device.statistics');
Route::get('device/statistics/unrepaired','DevicesController@showUnrepaired' )->middleware('can:user-manager')->name('device.statisticsUnRepaired');
Route::get('device/statistics/repaired','DevicesController@showRepaired' )->middleware('can:user-manager')->name('device.statisticsRepaired');
Route::get('device/statistics/withdrawn','DevicesController@showWithdrawn' )->middleware('can:user-manager')->name('device.statisticsWithdrawn');
Route::get('device/statistics/notWithdrawn','DevicesController@showNotWithdrawn' )->middleware('can:user-manager')->name('device.statisticsNotWithdrawn');

Route::get('device/find','DevicesController@indexFind' )->name('device.find');
Route::post('device/find','DevicesController@findDevice' )->name('device.findDevice');
Route::resource('/device', 'DevicesController');