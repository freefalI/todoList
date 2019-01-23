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


Route::get('/','MainController@index');
Route::group(['middleware' => ['auth']], function () {
    Route::resource('projects', 'ProjectController');
    
    Route::group(['middleware' => ['can:access,project']], function () {
        Route::patch('project/{project}/clear', 'ProjectController@deleteAllTasks');
        Route::post('/projects/{project}/tasks', 'TaskController@store');

    });
    Route::group(['middleware' => ['can:access,task']], function () {
        Route::patch('/tasks/{task}', 'TaskController@update');
        Route::delete('/tasks/{task}', 'TaskController@destroy');
    });


});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');