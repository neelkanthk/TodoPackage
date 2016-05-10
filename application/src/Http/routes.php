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
Route::get('packagename/viewtest', 'Package\Application\Http\Controllers\PackageController@index');
Route::get('packagename/eventtest', 'Package\Application\Http\Controllers\PackageController@eventAction');
Route::get('packagename/middlewaretest', ['middleware' => 'packagename_auth', 'uses' => 'Package\Application\Http\Controllers\PackageController@restrictedAccess']);
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
