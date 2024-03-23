<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class coach extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[['name'=>'ahmad'],['name'=>'samer'],['name'=>'karem']];
        DB::table('coaches')->insert($data);
    }
}
