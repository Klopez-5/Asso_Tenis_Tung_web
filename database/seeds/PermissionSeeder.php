<?php

use Illuminate\Database\Seeder;
use \App\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name'=>'Listar Usuarios',
            'slug'=>'user.index',
            'description'=>'Se puede listar usuarios',
        ]);

        Permission::create([
            'name'=>'Editar Usuarios',
            'slug'=>'user.edit',
            'description'=>'Se puede editar los datos del usuario',
        ]);

        Permission::create([
            'name'=>'Detalle Usuarios',
            'slug'=>'user.show',
            'description'=>'Se puede ver a detalle los datos del usuario',
        ]);

        Permission::create([
            'name'=>'Crear Usuarios',
            'slug'=>'user.create',
            'description'=>'Se puede crear un nuevo usuario',
        ]);

        Permission::create([
            'name'=>'Eliminar Usuarios',
            'slug'=>'user.destroy',
            'description'=>'Se puede eliminar usuarios',
        ]);
//-------------------------------------------------------------------------------------
        Permission::create([
            'name'=>'Listar Roles',
            'slug'=>'role.index',
            'description'=>'Puede ver todos los roles existentes',
        ]);

        Permission::create([
            'name'=>'Crear Roles',
            'slug'=>'role.create',
            'description'=>'Puede crear nuevos roles',
        ]);

        Permission::create([
            'name'=>'Editar Roles',
            'slug'=>'role.edit',
            'description'=>'Puede editar los datos del roles',
        ]);

        Permission::create([
            'name'=>'Detalle Roles',
            'slug'=>'role.show',
            'description'=>'Se puede ver a detalle los datos del roles',
        ]);

        Permission::create([
            'name'=>'Eliminar Roles',
            'slug'=>'role.destroy',
            'description'=>'Se puede eliminar roles',
        ]);
//-------------------------------------------------------------------------------------
        Permission::create([
            'name'=>'Listar Torneos',
            'slug'=>'tournaments.index',
            'description'=>'Se puede ver todos los torneos',
        ]);

        Permission::create([
            'name'=>'Editar Torneos',
            'slug'=>'tournaments.edit',
            'description'=>'Se puede editar los datos del torneo',
        ]);

        Permission::create([
            'name'=>'Detalle Torneos',
            'slug'=>'tournaments.show',
            'description'=>'Se puede ver a detalle los datos del torneo',
        ]);

        Permission::create([
            'name'=>'Crear Torneos',
            'slug'=>'tournaments.create',
            'description'=>'Se puede crear un nuevo torneo',
        ]);

        Permission::create([
            'name'=>'Eliminar Torneos',
            'slug'=>'tournaments.destroy',
            'description'=>'Se puede eliminar torneos',
        ]);
//-------------------------------------------------------------------------------------
        Permission::create([
            'name'=>'Listar Logros',
            'slug'=>'achievements.index',
            'description'=>'Se puede ver todos los Logros',
        ]);

        Permission::create([
            'name'=>'Editar Logros',
            'slug'=>'achievements.edit',
            'description'=>'Se puede editar los datos del Logro',
        ]);

        Permission::create([
            'name'=>'Detalle Logros',
            'slug'=>'achievements.show',
            'description'=>'Se puede ver a detalle los datos del Logro',
        ]);

        Permission::create([
            'name'=>'Crear Logros',
            'slug'=>'achievements.create',
            'description'=>'Se puede crear un nuevo Logro',
        ]);

        Permission::create([
            'name'=>'Eliminar Logros',
            'slug'=>'achievements.destroy',
            'description'=>'Se puede eliminar Logros',
        ]);
//-------------------------------------------------------------------------------------
        Permission::create([
        'name'=>'Listar Categoria',
        'slug'=>'category.index',
        'description'=>'Se puede ver todos las categoriasñ',
    ]);

        Permission::create([
            'name'=>'Editar Categoria',
            'slug'=>'category.edit',
            'description'=>'Se puede editar los datos de la categoria',
        ]);

        Permission::create([
            'name'=>'Detalle Categoria',
            'slug'=>'category.show',
            'description'=>'Se puede ver a detalle los datos de la categoria',
        ]);

        Permission::create([
            'name'=>'Crear Categoria',
            'slug'=>'category.create',
            'description'=>'Se puede crear una nueva categoria',
        ]);

        Permission::create([
            'name'=>'Eliminar Categoria',
            'slug'=>'category.destroy',
            'description'=>'Se puede eliminar categorias',
        ]);
//-------------------------------------------------------------------------------------
        Permission::create([
            'name'=>'Listar Nivel',
            'slug'=>'level.index',
            'description'=>'Se puede ver todos los niveles',
        ]);

        Permission::create([
            'name'=>'Editar Nivel',
            'slug'=>'level.edit',
            'description'=>'Se puede editar los datos del nivel',
        ]);

        Permission::create([
            'name'=>'Detalle Nivel',
            'slug'=>'level.show',
            'description'=>'Se puede ver a detalle los datos del nivel',
        ]);

        Permission::create([
            'name'=>'Crear Nivel',
            'slug'=>'level.create',
            'description'=>'Se puede crear un nuevo nivel',
        ]);

        Permission::create([
            'name'=>'Eliminar Nivel',
            'slug'=>'level.destroy',
            'description'=>'Se puede eliminar niveles',
        ]);
//-------------------------------------------------------------------------------------
        Permission::create([
            'name'=>'Listar Permisos',
            'slug'=>'permission.index',
            'description'=>'Se puede ver todos los permisos',
        ]);

        Permission::create([
            'name'=>'Editar Permisos',
            'slug'=>'permission.edit',
            'description'=>'Se puede editar los datos de los permisos',
        ]);

        Permission::create([
            'name'=>'Detalle Permisos',
            'slug'=>'permission.show',
            'description'=>'Se puede ver a detalle los datos de los permisos',
        ]);

        Permission::create([
            'name'=>'Crear Permisos',
            'slug'=>'permission.create',
            'description'=>'Se puede crear un nuevo permiso',
        ]);

        Permission::create([
            'name'=>'Eliminar Permisos',
            'slug'=>'permission.destroy',
            'description'=>'Se puede eliminar permisos',
        ]);
//-------------------------------------------------------------------------------------
        Permission::create([
            'name'=>'Panel de control',
            'slug'=>'dashboard.index',
            'description'=>'Pantalla principal',
        ]);
//-------------------------------------------------------------------------------------
        Permission::create([
            'name'=>'Editar mi propio usuario',
            'slug'=>'userown.edit',
            'description'=>'Se puede editar los datos de mi propio usuario',
        ]);

        Permission::create([
            'name'=>'Detalle de mi propio usuario',
            'slug'=>'userown.show',
            'description'=>'Se puede ver a detalle los datos de mi propio usuario',
        ]);
//-------------------------------------------------------------------------------------
        Permission::create([
            'name'=>'Logros propios',
            'slug'=>'achievementsown.show',
            'description'=>'El deportista podra ver sus propios logros',
        ]);
        Permission::create([
            'name'=>'Torneos propios',
            'slug'=>'tournamentsown.show',
            'description'=>'El Deportista podra ver a que torneos esta inscrito',
        ]);
    }
}
