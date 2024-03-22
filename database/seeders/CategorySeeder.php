<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data=[['name'=>'Abdominal Exercises'],['name'=>'Chest exercises'],['name'=>'Arm exercises'],
            ['name'=>'Leg exercises'],['name'=>'Back and shoulder exercises']
            ];
        DB::table('cates')->insert($data);
        }
}
