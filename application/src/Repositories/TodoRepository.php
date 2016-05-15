<?php

/**
 * Database Repository for the package.
 * 
 * @author Neelkanth Kaushik
 * @since 1.0.0
 */

namespace TodoPackage\Application\Repositories;

use TodoPackage\Application\Interfaces\TodoInterface;
use TodoPackage\Application\Models\Todo;

class TodoRepository implements TodoInterface {

    /**
     * Get the list of all tasks with pagination
     * @return type
     */
    public function getTasks() {
        try {
            $data = Todo::paginate(5);
        } catch (Exception $ex) {
            
        }
        return $data;
    }

    /**
     * Add new task
     * @param type $task
     * @return type
     */
    public function addTask($task) {

        try {
            $newTask = new Todo;
            $newTask->name = $task['name'];
            return $newTask->save();
        } catch (Exception $ex) {
            
        }
    }

    /**
     * Remove a task
     * @param type $id
     * @return type
     */
    public function deletetask($id) {
        try {
            $status = Todo::destroy($id);
        } catch (Exception $ex) {
            
        }
        return $status;
    }

}
