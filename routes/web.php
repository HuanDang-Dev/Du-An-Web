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
Route::get('/home', function () {
    return view('welcome');
});
Route::get('/search', function () {
    return view('search');
});
Route::get('/notFound', function () {
    return view('404');
});
Route::get('/post', 'HomeController@indexPost');
Route::get('/admin', 'HomeController@indexAdmin');
Route::get('/owner', 'HomeController@indexOwner');
Route::get('/rule', 'HomeController@indexRule');
Route::get('/viewMotel/{slug}/', function () {
    return view('viewMotel');
});
Route::post('/storemotel', 'MotelController@storeMotel');
Route::get('/logout', 'HomeController@logout');
Route::post('/login', 'Controller@login');
Auth::routes();
// Route::post('readUpdate', 'MessageController@updateUnread')->name('read');
Route::get('/chat', 'HomeController@index')->name('chat');
Route::get('userlist', 'MessageController@user_list')->name('user.list');
Route::get('usermessage/{id}', 'MessageController@user_message')->name('user.message');
Route::post('sendnewmessage', 'MessageController@send_message')->name('user.message.send');
Route::get('unreadupdate/{id}', 'MessageController@update_unread')->name('user.message.unread');
Route::get('deletesinglemessage/{id}', 'MessageController@delete_single_message')->name('user.message.delete.single');
Route::get('deleteallmessage/{id}', 'MessageController@delete_all_message')->name('user.message.delete.all');


Route::post('/comment', 'CommentController@store')->name('comment');
Route::post('motel/comment', 'CommentController@index')->name('motel.comment');


