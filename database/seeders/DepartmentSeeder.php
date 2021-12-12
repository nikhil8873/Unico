<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $depts = ['OPERATIONAL','PHP','JS','IOS','ANDROID'];

        foreach ($depts as $name) {
            Department::create(['name'=>$name]);
        }
    }
}
