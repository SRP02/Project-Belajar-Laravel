<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Student::factory(100)->create();

        Department::factory()->create([
            'name' => 'PPLG',
            'desc' => 'Koding🗣️🗣️🔥🔥🔥'
        ]);
        for ($level = 10; $level <= 12; $level++) { 
            for ($section = 1; $section <= 2; $section++) { 
                Grade::factory()->create([
                    'name' => "{$level} PPLG {$section}",
                    'department_id' => 1,
                ]);
            }
        }

        Department::factory()->create([
            'name' => 'Animation 2D',
            'desc' => 'Department Of Animation'
        ]);
        Department::factory()->create([
            'name' => 'Animation 3D',
            'desc' => 'Department Of Animation'
        ]);
        for ($level = 10; $level <= 12; $level++) { 
            for ($section = 1; $section <= 5; $section++) { 
                if ($section <= 3) {
                    $departmentId = 2;
                } else {
                    $departmentId = 3;
                }
                Grade::factory()->create([
                    'name' => "{$level} Anim {$section}",
                    'department_id' => $departmentId,
                ]);
            }
        }

        Department::factory()->create([
            'name' => 'DKV DG',
            'desc' => 'Visual Communication Design'
        ]);

        Department::factory()->create([
            'name' => 'DKV TG',
            'desc' => 'Visual Communication Design'
        ]);
        for ($level = 10; $level <= 12; $level++) { 
            for ($section = 1; $section <= 5; $section++) { 
                if ($section <= 3) {
                    $departmentId = 4;
                } else {
                    $departmentId = 5;
                }
                Grade::factory()->create([
                    'name' => "{$level} DKV {$section}",
                    'department_id' => $departmentId,
                ]);
            }
        }
    }
}