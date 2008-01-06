<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //delete categories table records
    	DB::table('permissions')->delete();
        //insert dummy data
        DB::table('permissions')->insert(array(array
        	(
        		'name' => 'role-list',
        		'display_name' => 'Display Role Listing',
        		'description' => 'See only Listing Of Role'
        	),
        	array(
        		'name' => 'role-create',
        		'display_name' => 'Create Role',
        		'description' => 'Create New Role'
        	),
        	array(
        		'name' => 'role-edit',
        		'display_name' => 'Edit Role',
        		'description' => 'Edit Role'
        	),
        	array(
        		'name' => 'role-delete',
        		'display_name' => 'Delete Role',
        		'description' => 'Delete Role'
        	),
        	array(
        		'name' => 'item-list',
        		'display_name' => 'Display Item Listing',
        		'description' => 'See only Listing Of Item'
        	),
        	array(
        		'name' => 'item-create',
        		'display_name' => 'Create Item',
        		'description' => 'Create New Item'
        	),
        	array(
        		'name' => 'item-edit',
        		'display_name' => 'Edit Item',
        		'description' => 'Edit Item'
        	),
        	array(
        		'name' => 'item-delete',
        		'display_name' => 'Delete Item',
        		'description' => 'Delete Item'
        	),
        ));
    }
}
