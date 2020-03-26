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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});


Route::post('/getUserDetails', 'UserDetailsController@store')->name('student.details');

Route::resource('submitPhysicalFunctions','PhysicalFunctionsController');
Route::resource('submitCognitiveFunctions','CognitiveFunctionsController');
Route::resource('submitRelationships','RelationshipsController');
Route::resource('submitEmotions','EmotionsController');
Route::resource('submitMovementData','MovementController');
Route::resource('submitSelfCare','SelfCareController');


Route::post('/language','LanguageController@changeLanguage');



