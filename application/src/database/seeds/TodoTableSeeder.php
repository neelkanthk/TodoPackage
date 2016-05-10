<?php

/**
 * An example Seeder class for the package tables.
 * 
 * @author Neelkanth Kaushik
 * @since 1.0.0
 */

namespace TodoPackage\Application\database\seeds;

use Illuminate\Database\Seeder;
use \DB;

class TodoTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //
        DB::table('todos')->insert([
            [
                'name' => 'Create Task'
            ], [
                'name' => 'Delete Task'
            ], [
                'name' => 'Update Task'
            ], [
                'name' => 'View Task'
            ]
        ]);
    }

}
