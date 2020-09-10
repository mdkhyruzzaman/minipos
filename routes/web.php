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

Route::get('login', 'Auth\LoginController@login')->name('login');
Route::post('login', 'Auth\LoginController@authenticate')->name('login.confirm');

Route::group(['middleware' => 'auth'], function() {

    Route::get('logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('groups', 'UserGroupsController@index');
    Route::get('groups/create', 'UserGroupsController@create');
    Route::post('groups', 'UserGroupsController@store');
    Route::delete('groups/{id}', 'UserGroupsController@destory');


    Route::resource('users', 'UsersController');

    Route::get('users/{id}/sales', 'UserSalesController@index')->name('users.sales');

    Route::get('users/{id}/purchases', 'UserSalesController@index')->name('users.purchases');

    Route::get('users/{user_id}/payments', 'UserPaymentsController@index')->name('users.payments');
    Route::post('users/{user_id}/payments', 'UserPaymentsController@store')->name('users.payments.store');
    Route::delete('users/{user_id}/payments/{payment_id}', 'UserPaymentsController@destroy')->name('users.payments.destroy');

    Route::resource('categories','CategoriesController', ['except'=>['show']]);

    Route::resource('products', 'ProductsController');

});