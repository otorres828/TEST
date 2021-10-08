<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ROLES
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Post']);


        //PUBLICAR
        Permission::create(['name' => 'toposts'])->syncRoles([$role1,$role2]);

        //ACCESO USUARIOS
        Permission::create(['name' => 'users'])->syncRoles([$role1]);

        //ACCESO CATEGORIAS
        Permission::create(['name' => 'categories'])->syncRoles([$role1]);


        
    }
}
