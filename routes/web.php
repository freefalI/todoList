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

// Route::get('/projects', 'ProjectController@index');
// Route::get('/project/{id}/tasks', 'ProjectController@index');
Route::resource('projects', 'ProjectController');
Route::patch('/tasks/{task}', 'ProjectTasksController@update');
Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::any('/',function(){
    return 'hello!';
});