<?php

/**
 * An example Repository for the package.
 * Feel free to create more repositories.
 * 
 * @author Neelkanth Kaushik
 * @since 1.0.0
 */

namespace TodoPackage\Application\Repositories;

use TodoPackage\Application\Interfaces\TodoPackageInterface;
use TodoPackage\Application\Models\Todo;

class TodoRepository implements TodoInterface {

    public function getArray() {
        $list = array(
            '1' => 'John',
            '2' => 'Rambo'
        );
        return $list;
    }

    public function fetchFromDb() {
        return Todo::all();
    }

}
