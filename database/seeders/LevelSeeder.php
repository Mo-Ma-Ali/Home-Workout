<?php

namespace Database\Seeders;

use App\Models\Levels;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[['Level'=>'Beginner'],['Level'=>'middle'],['Level'=>'Advanced']
        ];
        DB::table('levels')->insert($data);
    }
}
