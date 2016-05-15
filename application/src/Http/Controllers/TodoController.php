<?php

/**
 * A basic package controller.
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
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('todopackage::pages.home');
    }

    public function dashboard() {
        //get the list of tasks
        $taskList = $this->todo->getTasks();
        //get current user
        $user = Auth::user();
        return view('todopackage::pages.dashboard')->withTasks($taskList)->withUser($user);
    }

    /**
     * Adding a new task in Todos
     * @param TaskRequest $request
     * @return type
     */
    public function addTask(TaskRequest $request) {
        $task = $request->all();
        $status = $this->todo->addTask($task);
        if ($status == true) {
            $request->session()->flash('todopackage_session_flash', 'A new task has been added.');
            $request->session()->flash('todopackage_session_flash_class', 'success');
        } else {
            $request->session()->flash('todopackage_session_flash', 'Try again.');
            $request->session()->flash('todopackage_session_flash_class', 'danger');
        }

        return redirect()->route('todo_dashboard');
    }

    /**
     * Removing a task from todos
     * @param type $id
     * @return type
     */
    public function deleteTask($id) {
        $status = $this->todo->deletetask($id);
        if ($status == true) {
            Session::flash('todopackage_session_flash', 'The task has been deleted successfully.');
            Session::flash('todopackage_session_flash_class', 'success');
        } else {
            Session::flash('todopackage_session_flash', 'Try again.');
            Session::flash('todopackage_session_flash_class', 'danger');
        }
        return redirect()->route('todo_dashboard');
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
     * 
     * @author Neelkanth Kaushik
     * @version 1.0.0
     */
    public function install() {
        return redirect('todo/index');
    }

}
