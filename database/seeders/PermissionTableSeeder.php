<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permissions
        $permissions = [

            // TR DIGITAL
            'trdigital-list',
            'trdigital-create',
            'trdigital-edit',
            'trdigital-delete',
            'trdigital-invoice',
            // Questões
            'questoes-list',
            'questoes-create',
            'questoes-edit',
            'questoes-delete',
            'questoes-invoice',
            //perfis-regras
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            //Biblioteca - Arquivos e Links
            'biblioteca-list',
            'biblioteca-create',
            'biblioteca-edit',
            'biblioteca-delete',
            //Usuários
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            //estado
            'estado-list',
            'estado-create',
            'estado-edit',
            'estado-delete',
            //orgaos
            'orgaos-list',
            'orgaos-create',
            'orgaos-edit',
            'orgaos-delete',
            //cidade
            'cidade-list',
            'cidade-create',
            'cidade-edit',
            'cidade-delete',
            //perfil
            'perfil-list',
            'perfil-create',
            'perfil-edit',
            'perfil-delete',







        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
