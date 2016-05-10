<?php

namespace TodoPackage\Application\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model {

    protected $table = 'todopackage_todo';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

}
