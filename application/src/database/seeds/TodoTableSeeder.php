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
use Carbon\Carbon;

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
                'name' => 'Create Task',
                'created_at' => Carbon::now(),
            ], [
                'name' => 'Delete Task',
                'created_at' => Carbon::now(),
            ], [
                'name' => 'Update Task',
                'created_at' => Carbon::now(),
            ], [
                'name' => 'View Task',
                'created_at' => Carbon::now(),
            ]
        ]);
    }

}
