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

Route::get('/', function () {
    return view('welcome');
});

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
    Route::get("/login", ['uses' => "UserController@login"]);
    Route::post("/login", ['uses' => "UserController@postLogin"]);
    Route::get('survey', 'SurveyController@getSurvey');
    Route::post('survey', 'SurveyController@postSurvey');
    Route::get('survey/step/{step}', 'SurveyController@getSurveyStep')->where(['step' => '[2-4]']);
    Route::post('survey/step/{step}', 'SurveyController@postSurveyStep')->where(['step' => '[2-4]']);
    Route::get('survey/done', 'SurveyController@getSurveyDone');
    Route::get('dashboard', 'SurveyController@getDashboard');
    Route::get('survey/show/{id}', 'SurveyController@show');
    //Route::resource('surveys', 'SurveyController');

});

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get("users", ['as' => 'users.index', 'uses' => 'UserController@index']);
    Route::get("/register", ['uses' => "UserController@create"]);
    Route::post("/register", ['uses' => "UserController@store"]);

    Route::get('/home', 'HomeController@index');

    Route::resource('users', 'UserController');

    Route::get('offices', ['as' => 'offices.index', 'uses' => 'OfficeController@index', 'middleware' => ['permission:office-list|office-create|office-edit|office-delete']]);
    Route::get('offices/create', ['as' => 'offices.create', 'uses' => 'OfficeController@create', 'middleware' => ['permission:office-create']]);
    Route::post('offices/store', ['as' => 'offices.store', 'uses' => 'OfficeController@store', 'middleware' => ['permission:office-create']]);
    Route::post('offices/update', ['as' => 'offices.update', 'uses' => 'OfficeController@update', 'middleware' => ['permission:office-edit']]);

    Route::get('offices/{id}', ['as' => 'offices.show', 'uses' => 'OfficeController@show']);
    Route::get('offices/{id}/edit', ['as' => 'offices.edit', 'uses' => 'OfficeController@edit', 'middleware' => ['permission:office-edit']]);
    Route::delete('offices/{id}', ['as' => 'offices.destroy', 'uses' => 'OfficeController@destroy', 'middleware' => ['permission:office-delete']]);

    Route::post('states/getStates', ['as' => 'states.getStatesList', 'uses' => 'StateController@getStatesList', 'middleware' => ['permission:state-list']]);
    Route::post('offices/getOffices', ['as' => 'offices.getOfficeList', 'uses' => 'OfficeController@getOfficesList', 'middleware' => ['permission:office-list']]);

    Route::get('roles', ['as' => 'roles.index', 'uses' => 'RoleController@index', 'middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
    Route::get('roles/create', ['as' => 'roles.create', 'uses' => 'RoleController@create', 'middleware' => ['permission:role-create']]);
    Route::post('roles/create', ['as' => 'roles.store', 'uses' => 'RoleController@store', 'middleware' => ['permission:role-create']]);
    Route::get('roles/{id}', ['as' => 'roles.show', 'uses' => 'RoleController@show']);
    Route::get('roles/{id}/edit', ['as' => 'roles.edit', 'uses' => 'RoleController@edit', 'middleware' => ['permission:role-edit']]);
    Route::patch('roles/{id}', ['as' => 'roles.update', 'uses' => 'RoleController@update', 'middleware' => ['permission:role-edit']]);
    Route::delete('roles/{id}', ['as' => 'roles.destroy', 'uses' => 'RoleController@destroy', 'middleware' => ['permission:role-delete']]);

    /*Route::get('itemCRUD2', ['as' => 'itemCRUD2.index', 'uses' => 'ItemCRUD2Controller@index', 'middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);
Route::get('itemCRUD2/create', ['as' => 'itemCRUD2.create', 'uses' => 'ItemCRUD2Controller@create', 'middleware' => ['permission:item-create']]);
Route::post('itemCRUD2/create', ['as' => 'itemCRUD2.store', 'uses' => 'ItemCRUD2Controller@store', 'middleware' => ['permission:item-create']]);
Route::get('itemCRUD2/{id}', ['as' => 'itemCRUD2.show', 'uses' => 'ItemCRUD2Controller@show']);
Route::get('itemCRUD2/{id}/edit', ['as' => 'itemCRUD2.edit', 'uses' => 'ItemCRUD2Controller@edit', 'middleware' => ['permission:item-edit']]);
Route::patch('itemCRUD2/{id}', ['as' => 'itemCRUD2.update', 'uses' => 'ItemCRUD2Controller@update', 'middleware' => ['permission:item-edit']]);
Route::delete('itemCRUD2/{id}', ['as' => 'itemCRUD2.destroy', 'uses' => 'ItemCRUD2Controller@destroy', 'middleware' => ['permission:item-delete']]);*/

});
