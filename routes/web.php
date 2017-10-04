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

Route::get('/',[
    'uses'=>'Home\HomeController@index',
    'as'=>'home'
]);
#routes for user log in-out , register


Route::post('/register',[
    'uses'=>'Auth\AuthController@register',
    'as'=>'register'
    ]);
    
Route::post('/login',[
    'uses'=>'Auth\AuthController@login',
    'as'=>'login'
    ]);

Route::get('/logout',[
    'uses'=>'Auth\AuthController@logout',
    'as'=>'logout'
    ]);

#routes for timeline 

Route::get('/timeline',[
    'uses'=>'Timeline\TimelineController@index',
    'as'=>'get-timeline'
]);

#routes for status and comment

Route::post('/timeline/status',[
    'uses'=>'Status\StatusController@postStatus',
    'as'=>'post-status'
]);

Route::post('/timeline/comment/{status_id}',[
    'uses'=>'Comment\CommentController@postComment',
    'as'=>'post-comment'
]);


Route::get('/status/delete/{status_id}',[
    'uses'=>'Status\StatusController@deleteStatus',
    'as'=>'delete.status',    
]);



Route::get('/comment/delete/{comment_id}',[
    'uses'=>'Comment\CommentController@deleteComment',
    'as'=>'delete.comment',
]);


 Route::get('status/edit/{status_id}',[
    'uses'=>'Status\StatusController@getEdit',
    'as'=>'get.status'
]);


Route::post('status/edit/{status_id}',[
    'uses'=>'Status\StatusController@editStatus',
    'as'=>'edit.status'
]);


Route::get('comment/edit/{comment_id}',[
    'uses'=>'Comment\CommentController@getEdit',
    'as'=>'get.comment'
]);


Route::post('comment/edit/{comment_id}',[
    'uses'=>'Comment\CommentController@editCommnet',
    'as'=>'edit.comment'
]);


Route::get('status/{status_id}/like',[
    'uses'=>'Status\StatusController@getLike',
    'as'=>'like.status'
]);

Route::get('comment/{comment_id}/like',[
    'uses'=>'Comment\CommentController@getLike',
    'as'=>'like.comment'
]);


#routes for friend page

Route::get('/friend',[
    'uses'=>'Friend\FriendController@index',
    'as'=>'index.friend'
]);

Route::get('/friend/{user_name}',[
    'uses'=>'Friend\FriendController@addFriend',
    'as'=>'add.friend'
]);

Route::get('/friend/accept/{user_name}',[
    'uses'=>'Friend\FriendController@acceptFriend',
    'as'=>'accept.friend'
]);

Route::post('/friend/find',[
    'uses'=>'Friend\FriendController@findFriend',
    'as'=>'find.friend'
]);



#routes for profile page

Route::get('/profile/{user_id}',[
    'uses'=>'Profile\ProfileController@index',
    'as'=>'index.profile'
]);

