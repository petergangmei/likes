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

Route::get('/menu','NavController@index');

Route::get('/search', 'MainController@search');

Route::get('/notification', 'NotificationController@taskcompleted');


Route::post('/uploadprofile_img', 'UserdetailController@uploadprofile_img');

Route::post('/add_photo', 'UserdetailController@add_photo');

Route::post('/update_bio', 'UserdetailController@update_bio');

Route::get('/photoid-{id}', 'UserdetailController@view_photo');

Route::get('/deletephotoid-{id}', 'UserdetailController@delete_photo');

Route::get('/preferencepage1', 'HomeController@preference_page');

Route::post('/update_preference', 'UserdetailController@update_preference');

Route::post('/searchfilter', 'MainController@searchfilter');

// view profile 

Route::get('/profileid-{id}', 'MainController@viewprofile');

Route::post('/matchout', 'MainController@matchout');

Route::post('/addfriend', 'MainController@add_friend');

Route::post('/cancelrequest', 'MainController@cancel_request');

Route::post('/acceptrequest', 'MainController@accept_request');