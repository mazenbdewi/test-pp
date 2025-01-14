<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesAndPermissionsSeeder extends Seeder
{ 
    public function run(): void
    {
        $permissions = [
            'view courses',         
            'create courses',       
            'edit courses',        
            'delete courses',     
            'view sections',         
            'create sections',      
            'edit sections',         
            'delete sections',      
            'view teachers',         
            'create teachers',       
            'edit teachers',         
            'delete teachers',      
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $adminRole = Role::create(['name' => 'admin']);
        $studentRole = Role::create(['name' => 'student']);
        $teacherRole = Role::create(['name' => 'teacher']);

  
        $adminRole->givePermissionTo(Permission::all());  

      
        $studentRole->givePermissionTo([
            'view courses',      
            'view sections',   
        ]);

       
        $teacherRole->givePermissionTo([
            'view courses',    
            'view sections',      
            'edit courses',    
        ]);
    }
}
