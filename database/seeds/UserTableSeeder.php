<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$admin = new User();
    	$admin->name = 'Administrator';
    	$admin->email = 'admin@ass.com';
    	$admin->password = bcrypt('admin123');
    	$admin->save();
    }
}
