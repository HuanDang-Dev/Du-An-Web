<?php
use App\User;
use App\Motel;

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
Route::get('/search/{slug}', function () {
    return view('search');
});
Route::get('/notFound', function () {
    return view('404');
});
Route::get('/post', 'HomeController@indexPost');
Route::get('/admin', 'HomeController@indexAdmin');
Route::get('/owner', 'HomeController@indexOwner');
Route::get('/rule', 'HomeController@indexRule');
Route::get('/commentIndex', 'CommentController@indexComment');
Route::get('/viewMotel/{slug}/', function ($slug) {
    $motel = Motel::where('slug', $slug)->first();  
    if($motel){
       if(auth()->user()){
            if($motel->user_id == auth()->user()->id){
                return view('viewMotel');
            }
            $user = User::where('id', auth()->user()->id)->first();
            if($user->role == 1){
                return view('viewMotel');
            }
       }
        if($motel->approve == 1){
            $motel->count_view += 1;
            $motel->save();
            return view('viewMotel');
        }
        return view('404');
    }
    return view('404');
});
Route::post('/storemotel', 'MotelController@storeMotel');
Route::get('/logout', 'HomeController@logout');
Route::post('/login', 'HomeController@login');
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
Route::post('/motel/comment', 'CommentController@index')->name('motel.comment');

Route::get('/admin/getindex', 'AdminController@indexAdmin');
Route::post('admin/approve', 'AdminController@approveMotel');
Route::post('admin/delete', 'AdminController@deleteMotel');
Route::post('admin/report', 'AdminController@confirmReport');

Route::get('/owner/getindex', 'UserController@indexOwner');
Route::post('/owner/rent', 'UserController@rentMotel');
Route::post('/owner/notrent', 'UserController@notrentMotel');

Route::post('/report', 'ReportController@getReport');

Route::post('/reply', 'CommentReplyController@store')->name('reply');
Route::post('/reply/comment', 'CommentReplyController@index')->name('reply.comment');

Route::post('/viewmotel/rating', 'MotelController@rating'); 
// Route::get('/auth', "HomeController@indexAuth");
Route::post('/getviewmotel', 'MotelController@getViewMotel');

