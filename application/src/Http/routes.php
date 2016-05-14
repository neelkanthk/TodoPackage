<?php

/**
 * Define your package specific routes here.
 * 
 * @author Neelkanth Kaushik
 * @since 1.0.0
 */
// Example routes
Route::get('todopackage/test', 'TodoPackage\Application\Http\Controllers\TodoController@testAction');
Route::get('packagename/dbtest', 'Package\Application\Http\Controllers\PackageController@databaseAccess');
Route::get('todopackage/viewtest', 'TodoPackage\Application\Http\Controllers\TodoController@index');
Route::get('packagename/eventtest', 'Package\Application\Http\Controllers\PackageController@eventAction');
Route::get('todopackage/middlewaretest', ['middleware' => 'todopackage_auth', 'uses' => 'TodoPackage\Application\Http\Controllers\TodoController@restrictedAccess']);
/*
  First run and installations route
  This route is optional and completely customizable.

  If you want to create some tables for your package this route may come handy.
  This will check for the "packagename_tablename" in the database and run the migration if it is not present.

 */
Route::get('todopackage/install', ['as' => 'todopackage_installation', 'uses' => 'TodoPackage\Application\Http\Controllers\TodoController@install']);

Route::get('todopackage', ['as' => 'todopackage_root', function() {
        if (!Schema::hasTable('todos')) {
            return redirect()->route('todopackage_installation');
        } else {
            return redirect()->route('todopackage_index');
        }
    }]);

/* First run and installations */

/*
 * TodoPackage Routes
 */

Route::get('todo/index', 'TodoPackage\Application\Http\Controllers\TodoController@index');

Route::get('todo/login', [
    'as' => 'todo_login', 'uses' => 'TodoPackage\Application\Http\Controllers\TodoAuthController@getLogin'
]);

Route::get('todo/logout', [
    'as' => 'todo_logout', 'uses' => 'TodoPackage\Application\Http\Controllers\TodoAuthController@getLogout'
]);

Route::post('todo/login', [
    'as' => 'todo_auth', 'uses' => 'TodoPackage\Application\Http\Controllers\TodoAuthController@postLogin'
]);
Route::group(['middleware' => 'todopackage_auth'], function () {
    Route::get('todo/dashboard', [
        'as' => 'todo_dashboard', 'uses' => 'TodoPackage\Application\Http\Controllers\TodoController@dashboard'
    ]);
    Route::post('todo/task', [
        'as' => 'add_task', 'uses' => 'TodoPackage\Application\Http\Controllers\TodoController@addTask']);

    Route::delete('todo/task/{id}', [
        'as' => 'delete_task', 'uses' => 'TodoPackage\Application\Http\Controllers\TodoController@deleteTask']);
});
