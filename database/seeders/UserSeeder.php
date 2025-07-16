<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'ver especialidades']);
        Permission::create(['name' => 'crear especialidades']);
        Permission::create(['name' => 'editar especialidades']);
        Permission::create(['name' => 'eliminar especialidades']);

        $adminUser = User::query()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'temporal',
            'email_verified_at' => now()
        ]);

        $roleAdmin = Role::create(['name' => 'super-admin']);
        $adminUser->assignRole($roleAdmin);
        $permissionsAdmin = Permission::query()->pluck('name');
        $roleAdmin->syncPermissions($permissionsAdmin);

        $secreUser = User::query()->create([
            'name' => 'secretaria',
            'email' => 'secretaria@gmail.com',
            'password' => 'temporal',
            'email_verified_at' => now()
        ]);

        $roleSecretaria = Role::create(['name' => 'secretaria']);
        $secreUser->assignRole($roleSecretaria);
        $roleSecretaria->syncPermissions(['ver especialidades']);
    }
}
