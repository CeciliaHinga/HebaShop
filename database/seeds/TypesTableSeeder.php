<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //delete categories table records
    DB::table('types')->delete();
    //insert dummy data
    DB::table('types')->insert(array(array('ads_type'=>'Toys','category_id'=>'1'),array('ads_type'=>'Electronics','category_id'=>'1'),array('ads_type'=>'Land','category_id'=>'2'),array('ads_type'=>'Mortgages','category_id'=>'2'),array('ads_type'=>'Blue Collar','category_id'=>'3'),array('ads_type'=>'White Collar','category_id'=>'3'),array('ads_type'=>'Bikes','category_id'=>'4'),array('ads_type'=>'Cars','category_id'=>'4'),));
        //
    }
}
