<?php

namespace TodoPackage\Application\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model {

    protected $table = 'todos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

}
