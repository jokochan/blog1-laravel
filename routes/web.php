<?php


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'BlogsController@index');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/blogs', 'BlogsController@index')->name('blogs');
Route::get('/blogs/create', 'BlogsController@create')->name('blogs.create');
Route::post('/blogs/store', 'BlogsController@store')->name('blogs.store');

// keep trashed routes here
Route::get('/blogs/trash', 'BlogsController@trash')->name('blogs.trash');
Route::get('/blogs/trash/{id}/restore', 'BlogsController@restore')->name('blogs.restore');
Route::delete('/blogs/trash/{id}/permanent-delete', 'BlogsController@permanentDelete')->name('blogs.permanent-delete');

Route::get('/blogs/{id}', 'BlogsController@show')->name('blogs.show');
Route::get('/blogs/{id}/edit', 'BlogsController@edit')->name('blogs.edit');
Route::patch('/blogs/{id}/update', 'BlogsController@update')->name('blogs.update');
Route::delete('/blogs/{id}/delete', 'BlogsController@delete')->name('blogs.delete');

// Admin routes
// Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::get('/dashboard', 'AdminController@index')->name('dashboard');
Route::get('/admin/blogs', 'AdminController@blogs')->name('admin.blogs');
// Route::get('/admin', 'AdminController@index')->name('admin.index')->middleware('admin');
// Route::get('/admin', 'AdminController@index')->name('admin.index')->middleware(['admin', 'auth']);

// Resource Category
Route::resource('categories', 'CategoryController');
Route::resource('users', 'UserController');
