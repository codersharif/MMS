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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contact', 'ContactController@show');
Route::post('/contact/send', 'ContactController@send')->name('contact.send');

Route::get('/payment', 'PaymentController@show')->middleware('auth');
Route::post('/payment', 'PaymentController@store')->middleware('auth')->name('payment.send');
Route::post('/payment/action', 'PaymentController@eventAction')->middleware('auth')->name('payment.eventAction');

Route::get('/notification', 'userNotificationsController@show')->middleware('auth');

//mil chart route 
Route::get('/mil/cost', 'MilchartController@cost')->middleware('auth')->name('cost');
Route::post('/cost/save', 'MilchartController@costSave')->middleware('auth');

Route::get('/mil/savings', 'MilchartController@savings')->middleware('auth')->name('savings');
Route::post('/saving/save', 'MilchartController@savingsSave')->middleware('auth');
Route::post('/mil/count', 'MilchartController@milcount')->middleware('auth');

Route::post('/mil/email/send', 'ContactController@emailSent')->middleware('auth')->name('email.send');
