<?php

Route::get('/',function(){
  return view('welcome');
});
Route::get('post/{post}','AdminPostsController@post');




Route::auth();
Route::get('/home', 'HomeController@index');
//Route::get('post/{id}','PostsController@post');
//Route::get('post/{id}',['as'=>'home.post','uses'=>'AdminPostsController@post']);
Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){

  Route::get('/admin',function(){
    return view('admin.index');
  });


    Route::resource('/users','AdminUsersController');
    Route::resource('/posts','AdminPostsController');
    Route::resource('/categories','AdminCategoriesController');
    Route::resource('/media','AdminMediasController');
    Route::resource('/comments','AdminCommentsController');
    Route::resource('/comment/replies','CommentRepliesController');
});
