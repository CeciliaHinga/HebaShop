<?php

use Illuminate\Database\Seeder;

class RolesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
      public function run()
    {
        //delete categories table records
        DB::table('roles')->delete();
        //insert dummy data
        DB::table('roles')->insert(array(array('name'=>'Admin','display_name'=>'SuperAdmin','description'=>'Manages the site'),array('name'=>'Shopkeeper','display_name'=>'ShopOwner','description'=>'Manages the shop'),array('name'=>'Customer','display_name'=>'Customer','description'=>'Buys Items'),array('name'=>'Guest','display_name'=>'Guest','description'=>'Views Site'),));
    }
}