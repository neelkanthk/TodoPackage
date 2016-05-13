<?php

/**
 * A basic package controller.
 * Feel free to add more controllers to your package
 * 
 * @author Neelkanth Kaushik
 * @since 1.0.0
 */

namespace TodoPackage\Application\Http\Controllers;

use App\Http\Controllers\Controller;
use TodoPackage\Application\Http\Requests\TodoRequest;
use TodoPackage\Application\Interfaces\TodoInterface;
use Event;
use Package\Application\Events\PackageEvent;
use TodoPackage\Application\Http\Requests\TaskRequest;

class TodoController extends Controller {

    protected $todo;

    //Get the repository using Dependency Injection
    public function __construct(TodoInterface $object) {
        $this->todo = $object;
    }

    /**
     * Standard index action
     * 
     * @author Neelkanth Kaushik
     * @since 1.0.0
     * 
     */
    public function index() {
        //packagename_namespace should be same as the 
        //one defined in the PackageServiceProvider's $this->loadViewsFrom()
        return view('todopackage::pages.home');
    }

    public function addTask(TaskRequest $request) {
        $task = $request->all();
        $status = $this->todo->addTask($task);
        if ($status == true) {
            
        } else {
            
        }
    }

    /**
     * A simple action to return string
     * @author Neelkanth Kaushik
     * @since 1.0.0
     * @return string
     */
    public function testAction() {
        return "Hi I am TodoPackageController@testAction";
    }

    /**
     * A simple action to get the data from database
     * 
     * @author Neelkanth Kaushik
     * @since 1.0.0 
     */
    public function databaseAccess() {
        //Fetch the data using the repository function
        $data = $this->data->fetchFromDb();
        return $data;
    }

    public function eventAction() {
        Event::fire(new PackageEvent());
    }

    public function restrictedAccess() {
        return "Access granted";
    }

    /**
     * A basic installation action defined for setting up database tables
     * for your package
     * 
     * @author Neelkanth Kaushik
     * @version 1.0.0
     */
    public function install() {
        \Illuminate\Support\Facades\Artisan::call('migrate', array('--path' => '/vendor/TodoPackage/application/src/database/migrations/'));
        echo "<h2>Todo Package Tables Created Succesfully.</h2>";
        \Illuminate\Support\Facades\Artisan::call('db:seed', [
            '--class' => 'TodoPackage\Application\database\seeds\TodoTableSeeder'
        ]);
        echo "<br/>";
        echo "<h2>Todo Package Tables Seeded Successfully.</h2>";
    }

}
