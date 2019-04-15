<?php



Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('admin/users','AdminUsersController');

Route::get('/admin',function(){
  return view('admin.index');
});
