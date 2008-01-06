<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

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
        $role_list = new Permission();
                $role_list ->name = 'role-list';
                $role_list ->display_name = 'Display Role Listing';
                $role_list ->description = 'See only Listing Of Role';
                $role_list->save();
    
        $role_create = new Permission();
                $role_create ->name = 'role-create';
                $role_create ->display_name = 'Create Role';
                $role_create ->description = 'Create New Role';
                $role_create->save();
    
            $role_edit = new Permission();
                $role_edit ->name = 'role-edit';
                $role_edit ->display_name = 'Edit Role';
                $role_edit ->description = 'Edit Role';
                $role_edit->save();
            
        $role_delete = new Permission();
                $role_delete ->name = 'role-delete';
                $role_delete ->display_name = 'Delete Role';
                $role_delete ->description = 'Delete Role';
                $role_delete->save();
            
         DB::table('permissions')->insert(array (
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
        $role = Role::where('name','=','Admin')->firstOrFail();
        $role->attachPermissions(array ($role_list, $role_edit, $role_delete, $role_create));
    }
}
