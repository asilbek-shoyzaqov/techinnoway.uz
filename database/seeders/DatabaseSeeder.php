<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(WordSeeder::class);

        // Yangi user yaratish
        $user = User::create([
            'name' => 'Asilbek',
            'email' => 'asilbekshoyzaqov@gmail.com',
            'password' => Hash::make('admin!?123'),
        ]);

        // Admin rolini yaratish
        $role = Role::create(['name' => 'admin']);

        // Permissionlarni yaratish
        $permissions = [
            'edit',
            'delete',
            'create',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Rolga barcha permissionlarni biriktirish
        $role->givePermissionTo(Permission::all());

        // Userga admin rolini biriktirish
        $user->assignRole($role);
    }

}
