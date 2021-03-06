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
		$this->call('UserTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('TypesTableSeeder');
		$this->call('RolesTable');
		$this->call('PermissionTableSeeder');
		//message shown in your terminal after running db:seed command
		$this->command->info("Users table seeded:");
	}  
}
