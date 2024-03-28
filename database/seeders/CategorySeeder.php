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

        $data=[['name'=>'Abdominal Exercises','image'=>'public/uploads1711662885_abs.jpg'],['name'=>'Chest exercises','image'=>'public/uploads1711662786_chest.jpg'],['name'=>'Arm exercises','image'=>'public/uploads1711662934_arm.jpg'],
            ['name'=>'Leg exercises','image'=>'public/uploads1711662982_leg.jpg'],['name'=>'Back and shoulder exercises','image'=>'public/uploads1711663025_shoulder.jpg']
            ];
        DB::table('cates')->insert($data);
        }
}
