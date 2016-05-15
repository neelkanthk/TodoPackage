<?php

namespace TodoPackage\Application\Http\Middlewares;

use Closure;

class TodoPackageInstallMiddleware {

    /**
     * Run package migration if the 'todos' table is not created
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        //check if table exists
        if (!\Illuminate\Support\Facades\Schema::hasTable('todos')) {
            //run migration
            \Illuminate\Support\Facades\Artisan::call('migrate', array('--path' => '/vendor/TodoPackage/application/src/database/migrations/'));
            echo "<h2>Todo Package Tables Created Succesfully.</h2>";
            \Illuminate\Support\Facades\Artisan::call('db:seed', [
                '--class' => 'TodoPackage\Application\database\seeds\TodoTableSeeder'
            ]);
            echo "<br/>";
            echo "<h2>Todo Package Tables Seeded Successfully.</h2>";
            
            echo "<a href='".url('todo/index')."'>Visit package home page</a>";
        } else {
            return $next($request);
        }
    }

}
