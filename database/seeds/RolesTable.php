<?php

use Illuminate\Database\Seeder;
<<<<<<< HEAD
use App\User;
use App\Role;
use Zizaco\Entrust\EntrustPermission;
use Zizaco\Entrust\EntrustRole;
//use Zizaco\Entrust\Role;
use Zizaco\Entrust\Traits\EntrustUserTrait;
=======
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2

class RolesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
<<<<<<< HEAD
      public function run()
    {
        //delete categories table records
        DB::table('roles')->delete();
        //insert dummy data
        $roles = DB::table('roles')->insert(array(array('name'=>'Admin','display_name'=>'SuperAdmin','description'=>'Manages the site'),array('name'=>'Shopkeeper','display_name'=>'ShopOwner','description'=>'Manages the shop'),array('name'=>'Customer','display_name'=>'Customer','description'=>'Buys Items'),array('name'=>'Guest','display_name'=>'Guest','description'=>'Views Site'),));
        $user = User::where('email','=','cesshinga@gmail.com')->first();
        $user->attachRole(Role::where('name','=','Admin')->first());
    }
}
=======
    public function run()
    {
        //$role = new Role();{
    /**$roleAdmin = $role->create([
    'name' => 'Administrator',
    'slug' => 'administrator',
    'description' => 'manage administration privileges'
]);

$role = new Role();
$roleShopkeeper = $role->create([
    'name' => 'Shopkeeper',
    'slug' => 'shopkeeper',
    'description' => 'manage shopkeeping privileges'
]);

$role = new Role();
$roleCustomer = $role->create([
    'name' => 'Customer',
    'slug' => 'customer',
    'description' => 'manage customer privileges'
]);

$role = new Role();
$roleGuest = $role->create([
    'name' => 'Guest',
    'slug' => 'guest',
    'description' => 'manage guest privileges'
]);
}*/
    }
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
