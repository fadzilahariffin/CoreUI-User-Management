<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionRoleTableSeeder extends Seeder
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

        // Create Roles
        $superadmin = Role::create(['name' => 'superadmin']);
        $admin = Role::create(['name' => 'administrator']);
        $user = Role::create(['name' => 'user']);

        // Create Permissions
        $permissions = ['user-view','user-edit', 'user-delete', 'user-add'];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // ALWAYS GIVE ADMIN ROLE ALL PERMISSIONS
        $superadmin->givePermissionTo(Permission::all());
        $admin->givePermissionTo(Permission::all());


        // $this->enableForeignKeys();
    }
}
