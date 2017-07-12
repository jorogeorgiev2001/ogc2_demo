<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    })->middleware('guest');

    // Authentication Routes...
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');

    // Registration Routes...
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');


    //TaskController show all tasks
    Route::get('/tasks', 'TaskController@index');
    Route::delete('/task/{id}/destroy', ['as' => 'task.destroy', 'uses' => 'TaskController@destroy']);

    //Task store metod in TaskController
    Route::get('/task/add', 'TaskController@add');
    Route::post('/task/store', 'TaskController@store');

    //Task edit/update metod in TaskController
    Route::get('/task/{id}/edit', 'TaskController@edit');
    Route::patch('/task/{id}', ['as' => 'task.update', 'uses' => 'TaskController@update']);

    Route::get('/tasks/dateFilter', ['as' => 'tasks.dateFilter', 'uses' => 'TaskController@dateFilter']);
    Route::get('/tasks/fromDateToDate', ['as' => 'dateFilter.data', 'uses' => 'TaskController@fromDateToDate']);
    Route::post('/tasks/dateFilter', ['as' => 'dateFilter.filter', 'uses' => 'TaskController@updateDateFilter']);


    //Auth
    Route::auth();

    //Datatables
    Route::controller('tasks', 'TaskController', [
    'anyData'  => 'tasks.data',

    ]);
});
