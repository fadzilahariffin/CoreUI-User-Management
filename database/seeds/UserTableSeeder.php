<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
	// use DisableForeignKeys;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->disableForeignKeys();

        // Add the master administrator, user id of 1
        User::create([
            'first_name'        => 'Super',
            'last_name'         => 'Admin',
            'email'             => 'superadmin@admin.com',
            'password'          =>  Hash::make('secret'),
            'active' 			=>  true,
        ]);
        User::create([
            'first_name'        => 'Admin',
            'last_name'         => 'Giad',
            'email'             => 'admin@admin.com',
            'password'          =>  Hash::make('secret'),
            'active' 			=>  true,
        ]);

        // $this->enableForeignKeys();

    }
}
