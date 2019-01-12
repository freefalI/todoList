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
Route::get('/','MainController@index');

Route::patch('project/{project}/clear', 'ProjectController@deleteAllTasks');
Route::resource('projects', 'ProjectController')->middleware('auth');

Route::patch('/tasks/{task}', 'TaskController@update');
Route::post('/projects/{project}/tasks', 'TaskController@store');
Route::delete('/tasks/{task}', 'TaskController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');