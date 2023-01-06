<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_user = [
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];

        $staff = User::create(array_merge([
            'email' => 'staff@email.com',
            'name' => 'staff satu'
        ], $default_user));

        $spv = User::create(array_merge([
            'email' => 'spv@email.com',
            'name' => 'spv'
        ], $default_user));

        $manager = User::create(array_merge([
            'email' => 'manager@email.com',
            'name' => 'manager'
        ], $default_user));

        $role = Role::create(['name' => 'staff']);
        $role = Role::create(['name' => 'spv']);
        $role = Role::create(['name' => 'manager']);

        $permission = Permission::create(['name' => 'read role']);
        $permission = Permission::create(['name' => 'create role']);
        $permission = Permission::create(['name' => 'update role']);
        $permission = Permission::create(['name' => 'delete role']);

        $staff->assignRole('staff');
        $spv->assignRole('spv');
        $manager->assignRole('manager');
    }
}