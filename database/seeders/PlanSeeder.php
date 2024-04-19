<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[['name'=>'Week-1'],['name'=>'Week-2'],['name'=>'week-3'],['name'=>'week-4']];
        DB::table('plans')->insert($data);
    }
}
