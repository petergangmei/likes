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

Route::get('/', 'HomeController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/menu','NavController@index');

Route::get('/search', 'MainController@search');

Route::get('/search2', 'MainController@search2');

Route::get('/swipes', 'MainController@swipes');

Route::get('/notification', 'NotificationController@view');

Route::get('/feeds', 'FeedController@feeds');

Route::get('/addfeed', 'FeedController@addfeed');

Route::post('/addfeed', 'FeedController@post_feed');

Route::get('/myfeeds', 'FeedController@myfeeds');

Route::get('/friendsfeeds', 'FeedController@friendsfeeds');
Route::get('/localfeeds', 'FeedController@local_post');
Route::get('/nationalpost', 'FeedController@national_post');

Route::get('/viewpost{id}', 'FeedController@view_post');

Route::post('/likepost', 'FeedController@like_post');

Route::post('/postcomment', 'FeedController@post_comment');

Route::post('/uploadprofile_img', 'UserdetailController@uploadprofile_img');

Route::post('/add_photo', 'UserdetailController@add_photo');

Route::post('/update_bio', 'UserdetailController@update_bio');

Route::get('/photoid-{id}', 'UserdetailController@view_photo');

Route::get('/deletephotoid-{id}', 'UserdetailController@delete_photo');

Route::get('/reportphotoid-{id}', 'UserdetailController@report_photo');

Route::get('/reportcommentid-{id}', 'UserdetailController@report_comment');

Route::get('/deletepostid-{id}', 'FeedController@delete_post');

Route::get('/deletecommentid-{id}', 'FeedController@delete_comment');

Route::get('/preferencepage1', 'HomeController@preference_page');

Route::post('/update_preference', 'UserdetailController@update_preference');

Route::post('/searchfilter', 'MainController@searchfilter');

// view profile 

Route::get('/profileid-{id}', 'MainController@viewprofile');

Route::post('/matchout', 'MainController@matchout');

Route::post('/addfriend', 'MainController@add_friend');

Route::post('/cancelrequest', 'MainController@cancel_request');

Route::Post('/acceptrequest', 'MainController@accept_request');


Route::get('/notify', 'NotificationController@notify');


Route::post('/searhbyname', 'MainController@search_by_name');


// chatting section

Route::get('/messages/userid/{id}', 'ChatController@messageindex');
Route::post('/messages/userid/sendMessage', 'ChatController@sendMessage');
Route::post('/messages/userid/checkunseen', 'ChatController@checkunseen');
Route::post('/checkinbox', 'ChatController@check_inbox');
Route::post('/checknotification', 'NotificationController@check_notification');
Route::get('/messageslist', 'ChatController@messages_list');
Route::get('/deletemessage/{id}', 'ChatController@deletemessage');
Route::get('/addfriendsid', 'MainController@addfriendsid');

Route::get('/suggestlocation', 'MainController@suggest_location');

Route::get('/try', function(){
	// DB::table('suggestlocation')
 //                ->insert([
 //                    'location' => '$data['location']'
 //                ]);
	return view('try');
});

// setting
Route::get('/account_setting', 'NavController@account_setting');
Route::get('/edit_profile', 'NavController@edit_profile');
Route::post('/update_profile', 'SettingController@update_profile');
Route::post('/update_accountSetting', 'SettingController@update_accountSetting');
Route::post('/update_accountStatus', 'SettingController@update_accountStatus');
Route::post('/messages/{username}/message_privacy2', 'ChatController@message_privacy2Check');

// view all photo page
Route::get('/{name}/{id}/photos', 'UserdetailController@all_photos');
Route::get('/{name}/{id}/{pid}', 'UserdetailController@all_photos_view1');




// update news
Route::get('/news', 'NewsController@index');


// addmin panel
Route::get('/admin', 'AdminController@index');
Route::get('/admin/postnews', 'AdminController@postnews_index');
Route::post('/admin/postnews_', 'AdminController@postnews');