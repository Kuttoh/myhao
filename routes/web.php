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

//Route::get('/', 'HomeController@index')->name('home');

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pre-register', 'Auth\RegisterController@preRegister')->name('pre_register');

/*
 * Auth Routes
 */
Route::get('/register', 'Auth\RegisterController@index')->name('register');
Route::get('/register_dev', 'Auth\RegisterController@indexDev')->name('register_dev');
Route::get('/register_financier', 'Auth\RegisterController@indexFinancier')->name('register_financier');
Route::post('/register-client-user', 'Auth\RegisterController@registerClientUser')->name('register_client_user');
Route::post('/register-property-developer', 'Auth\RegisterController@registerPropertyDeveloper')->name('register_property_developer');
Route::post('/register-financial-institution', 'Auth\RegisterController@registerFinancialInstitution')->name('register_financial_institution');

/*
 * Property Routes
 */
Route::get('/', 'PropertyController@index')->name('home');
Route::get('/home', 'PropertyController@index')->name('home');
Route::get('/properties', 'PropertyController@index')->name('show_properties');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/properties/create', 'PropertyController@create')->name('create_property');
    Route::post('/properties/save', 'PropertyController@save')->name('save_property');

    Route::get('/properties/apply/{id}', 'ApplicationController@index')->name('apply');
    Route::post('/properties/apply/save', 'ApplicationController@save')->name('post_apply');
    Route::get('/applications', 'ApplicationController@show')->name('show_applications');
});

