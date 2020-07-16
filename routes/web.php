<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

//Auth::routes();

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pre-register', 'Auth\RegisterController@preRegister')->name('pre_register');

Route::get('/register', 'Auth\RegisterController@index')->name('register');
Route::get('/register_dev', 'Auth\RegisterController@indexDev')->name('register_dev');
Route::get('/register_financier', 'Auth\RegisterController@indexFinancier')->name('register_financier');

Route::post('/register-client-user', 'Auth\RegisterController@registerClientUser')->name('register_client_user');
Route::post('/register-property-developer', 'Auth\RegisterController@registerPropertyDeveloper')->name('register_property_developer');
Route::post('/register-financial-institution', 'Auth\RegisterController@registerFinancialInstitution')->name('register_financial_institution');
