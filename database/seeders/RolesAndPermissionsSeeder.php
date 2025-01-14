<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesAndPermissionsSeeder extends Seeder
{ 
    public function run(): void
    {
        
        $permissions = [
            'view courses', 'create courses', 'edit courses', 'delete courses',
            'view sections', 'create sections', 'edit sections', 'delete sections',
            'view teachers', 'create teachers', 'edit teachers', 'delete teachers',
            'view school', 'create school', 'edit school', 'delete school',
            'view students', 'create students', 'edit students', 'delete students', 
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $adminRole = Role::create(['name' => 'admin']);
        $studentRole = Role::create(['name' => 'student']);
        $teacherRole = Role::create(['name' => 'teacher']);

        $adminRole->givePermissionTo(Permission::all());

        $studentRole->givePermissionTo([
            'view courses', 'view sections','view teachers' ,'view school',   
        ]);

        $teacherRole->givePermissionTo([
           'view courses', 'view sections','view teachers' ,'view school',  'view students', 'create courses', 'edit courses', 'delete courses',
        ]);
 
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'password' => bcrypt('admin'),
        ]);
        $admin->assignRole('admin');

        $student = User::create([
            'name' => 'Student User',
            'email' => 'student@test.com',
            'password' => bcrypt('student'),
        ]);
        $student->assignRole('student');

        $teacher = User::create([
            'name' => 'Teacher User',
            'email' => 'teacher@test.com',
            'password' => bcrypt('teacher'),
        ]);
        $teacher->assignRole('teacher');
}
}