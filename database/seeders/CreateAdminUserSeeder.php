<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Unico',
            'email' => 'admin@unico.com',
            'password' => bcrypt('123456')
        ]);
        $department = Department::where(['name'=>'OPERATIONAL'])->first();

        $role = Role::create(['name' => $department->name.'-Admin','title' => 'Admin','department_id'=>$department->id]);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
