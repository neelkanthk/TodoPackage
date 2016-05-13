<?php

/**
 * An example Repository for the package.
 * Feel free to create more repositories.
 * 
 * @author Neelkanth Kaushik
 * @since 1.0.0
 */

namespace TodoPackage\Application\Repositories;

use TodoPackage\Application\Interfaces\TodoInterface;
use TodoPackage\Application\Models\Todo;

class TodoRepository implements TodoInterface {

    public function getTasks() {
        
    }

    public function addTask($task) {

        try {
            $newTask = new Todo;
            $newTask->name = $task['name'];
            return $newTask->save();
        } catch (Exception $ex) {
            
        }
    }

}
