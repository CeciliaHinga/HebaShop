<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//delete categories table records
    	DB::table('categories')->delete();
        //insert dummy data
        DB::table('categories')->insert(array(array('name'=>'Appliances'),array('name'=>'Real Estates'),array('name'=>'Jobs'),array('name'=>'Vehicles'),));
    }
}
