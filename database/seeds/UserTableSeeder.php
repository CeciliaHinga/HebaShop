<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //delete categories table records
    	DB::table('users')->delete();
        //insert dummy data
        DB::table('users')->insert(array('name'=>'Cecilia Hinga','email'=>'cesshinga@gmail.com','password'=>bcrypt('cecilia')));
    
    }
}
