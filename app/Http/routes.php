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
    Route::get("/login", ['as' => 'login', 'uses' => "UserController@login"]);
    Route::post("/login", ['uses' => "UserController@postLogin"]);
});

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get("users", ['as' => 'users.index', 'uses' => 'UserController@index', 'middleware' => ['permission:user-list']]);
    Route::get("users/create", ['as' => 'users.create', 'uses' => "UserController@create", 'middleware' => ['permission:user-create']]);
    Route::post("users/store", ['as' => 'users.store', 'uses' => "UserController@store", 'middleware' => ['permission:user-create']]);

    Route::patch("users/update/{id}", ['as' => 'users.update', 'uses' => "UserController@update", 'middleware' => ['permission:user-edit']]);

    Route::get('users/show/{id}', ['as' => 'users.show', 'uses' => 'UserController@show']);
    Route::get('users/{id}/edit', ['as' => 'users.edit', 'uses' => 'UserController@edit', 'middleware' => ['permission:user-edit']]);
    Route::delete('users/{id}', ['as' => 'users.destroy', 'uses' => 'UserController@destroy', 'middleware' => ['permission:user-delete']]);

    Route::get("/logout", ['uses' => "UserController@getLogout"]);

    Route::get('/home', 'HomeController@index');

    //Route::resource('users', 'UserController');

    Route::get('offices', ['as' => 'offices.index', 'uses' => 'OfficeController@index', 'middleware' => ['permission:office-list|office-create|office-edit|office-delete']]);
    Route::get('offices/create', ['as' => 'offices.create', 'uses' => 'OfficeController@create', 'middleware' => ['permission:office-create']]);
    Route::post('offices/store', ['as' => 'offices.store', 'uses' => 'OfficeController@store', 'middleware' => ['permission:office-create']]);
    Route::post('offices/update', ['as' => 'offices.update', 'uses' => 'OfficeController@update', 'middleware' => ['permission:office-edit']]);
    Route::get('offices/show/{id}', ['as' => 'offices.show', 'uses' => 'OfficeController@show']);
    Route::get('offices/{id}/edit', ['as' => 'offices.edit', 'uses' => 'OfficeController@edit', 'middleware' => ['permission:office-edit']]);
    Route::delete('offices/{id}', ['as' => 'offices.destroy', 'uses' => 'OfficeController@destroy', 'middleware' => ['permission:office-delete']]);

    Route::post('states/getStates', ['as' => 'states.getStatesList', 'uses' => 'StateController@getStatesList', 'middleware' => ['permission:state-list']]);
    Route::post('offices/getOffices', ['as' => 'offices.getOfficeList', 'uses' => 'OfficeController@getOfficesList', 'middleware' => ['permission:office-list']]);

    Route::get('roles', ['as' => 'roles.index', 'uses' => 'RoleController@index', 'middleware' => ['permission:role-list|role-create|role-edit|role-delete|role-show']]);
    Route::get('roles/create', ['as' => 'roles.create', 'uses' => 'RoleController@create', 'middleware' => ['permission:role-create']]);
    Route::post('roles/create', ['as' => 'roles.store', 'uses' => 'RoleController@store', 'middleware' => ['permission:role-create']]);
    Route::get('roles/{id}', ['as' => 'roles.show', 'uses' => 'RoleController@show']);
    Route::get('roles/{id}/edit', ['as' => 'roles.edit', 'uses' => 'RoleController@edit', 'middleware' => ['permission:role-edit']]);
    Route::patch('roles/{id}', ['as' => 'roles.update', 'uses' => 'RoleController@update', 'middleware' => ['permission:role-edit']]);
    Route::delete('roles/{id}', ['as' => 'roles.destroy', 'uses' => 'RoleController@destroy', 'middleware' => ['permission:role-delete']]);

    Route::get('audit', ["uses"=>'SurveyController@getSurvey',"middleware"=>["permission:audit-list"]]);
    Route::post('audit', ["uses"=>'SurveyController@postSurvey']);
    Route::get('audit/step/{step}', ["uses"=>'SurveyController@getSurveyStep'])->where(['step' => '[2-4]']);
    Route::post('audit/step/{step}', ["uses"=>'SurveyController@postSurveyStep'])->where(['step' => '[2-4]']);
    Route::get('audit/done', ["uses"=>'SurveyController@getSurveyDone']);
    Route::get('audit/failed', ["uses"=>'SurveyController@getSurveyNotApplied']);
    Route::get('dashboard', ["uses"=>'SurveyController@getDashboard']);
    Route::get('audit/show/{id}', ["uses"=>'SurveyController@show']);
    Route::post('audit/upload', ["uses"=>'SurveyController@postShow']);
    Route::get('audit/{id}/edit', ['as' => 'survey.edit', 'uses' => 'SurveyController@edit']);
    Route::patch('audit/update', ["uses"=>'SurveyController@update']);
    Route::get('audit/editstep/{step}', ["uses"=>'SurveyController@getSurveyStepEdit'])->where(['step' => '[2-4]']);
    Route::patch('audit/updatestep/{step}', ["uses"=>'SurveyController@getSurveyStepUpdate'])->where(['step' => '[2-4]']);
    //Route::resource('audit', '["uses"=>'SurveyController');

    Route::get('architect', ["uses"=>'ArchitectsController@getDashboard',"middleware"=>["permission:audit-list"]]);
    Route::get('architect/show/{id}', ["uses"=>'ArchitectsController@show']);
    Route::post('architect/upload', ["uses"=>'ArchitectsController@postShow']);
    Route::post("architect/assignArchitects",["as"=>"architect.assignUsers","uses"=>"ArchitectsController@assignArchitects","middleware"=>["role:superadmin|devadmin"]]);


    Route::post('audit/changeStatus
        ', ['as' => 'survey.changeStatus', 'uses' => 'SurveyController@changeStatus', 'middleware' => ['role:superadmin|devadmin']]);
    Route::post("audit/assignUsers",["as"=>"survey.assignUsers","uses"=>"SurveyController@assignUsers","middleware"=>["role:superadmin|devadmin"]]);
    //Route::resource('surveys', 'SurveyController');
});
