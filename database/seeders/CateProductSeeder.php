<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CateProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            ['name'=>'Sports clothes'],
            ['name'=>'sport shoes'],
            ['name'=>'Sports equipment'],
            ];
        DB::table('cate_products')->insert($data);
    }
}
