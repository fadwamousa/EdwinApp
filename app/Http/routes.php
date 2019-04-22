<?php

Route::get('/',function(){
  return view('welcome');
});
Route::get('post/{post}',['as'=>'home.post','uses'=>'AdminPostsController@post']);




Route::auth();
Route::get('/home', 'HomeController@index');
//Route::get('post/{id}','PostsController@post');
//Route::get('post/{id}',['as'=>'home.post','uses'=>'AdminPostsController@post']);
Route::group(['middleware'=>'admin'],function(){

  Route::get('/admin',function(){
    return view('admin.index');
  });


    Route::resource('admin/users','AdminUsersController');
    Route::resource('admin/posts','AdminPostsController');
    Route::resource('admin/categories','AdminCategoriesController');
    Route::resource('admin/media','AdminMediasController');
    Route::resource('admin/comments','AdminCommentsController');
    Route::resource('admin/comment/replies','CommentRepliesController');
});


Route::group(['middleware'=>'auth'],function(){


   Route::post('comment/replies','CommentRepliesController@createReply');


});
