<?php
use App\Category;
use App\Type;
use Illuminate\Database\Seeder; 

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
public function run()
	{
//call Categories and Types seeder classes
<<<<<<< HEAD
		$this->call('UserTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('TypesTableSeeder');
		$this->call('RolesTable');
		$this->call('PermissionTableSeeder');
=======
		$this->call('CategoriesTableSeeder');
		$this->call('TypesTableSeeder');
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
		//message shown in your terminal after running db:seed command
		$this->command->info("Users table seeded:");
	}  
}
