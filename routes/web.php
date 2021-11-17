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
/*
  |App version 1.0
  |@author shariful islam khan
  
 */

//Route::get('/', function () {
//    if (Auth::check()) {
//        return redirect('dashboard');
//    } else {
//        return view('auth.login');
//    }
//});

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    
Route::get('/users','UserController@index');
Route::get('/users/create','UserController@create');
Route::post('/users/store','UserController@store');
Route::get('/users/{id}/edit','UserController@edit');
Route::put('/users/update/{id}','UserController@update');
Route::delete('/users/{id}','UserController@destroy');

//setRecordPerPage
Route::post('setRecordPerPage', 'UsersController@setRecordPerPage');


//home
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

//mail
Route::get('/contact', 'ContactController@show');
Route::post('/contact/send', 'ContactController@send')->name('contact.send');

//payment
Route::get('/payment', 'PaymentController@show')->middleware('auth');
Route::post('/payment', 'PaymentController@store')->middleware('auth')->name('payment.send');
Route::post('/payment/action', 'PaymentController@eventAction')->middleware('auth')->name('payment.eventAction');

//Notification
Route::get('/notification', 'userNotificationsController@show')->middleware('auth');

//Meal Route 
Route::get('/meal', 'MealController@index')->name('index');
Route::get('/cost', 'MealController@cost')->name('cost');
Route::post('/cost/save', 'MealController@costSave');

//Saving list Route 
Route::get('/savinglist', 'SavingController@index')->name('index');

//Cost list Route 
Route::get('/costlist', 'CostController@index')->name('index');


Route::get('/savings', 'MealController@savings')->name('savings');
Route::post('/saving/save', 'MealController@savingsSave');
Route::post('/count', 'MealController@countStore');


//Email Route
Route::post('/email/send', 'ContactController@emailSent')->name('email.send');
    
    
});





