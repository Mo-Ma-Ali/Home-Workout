<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanWeightLossSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            ['plan_id'=>1,'Loss_id'=>1],
            ['plan_id'=>1,'Loss_id'=>2],
            ['plan_id'=>1,'Loss_id'=>3],
            ['plan_id'=>1,'Loss_id'=>4],
            ['plan_id'=>1,'Loss_id'=>5],

            ['plan_id'=>2,'Loss_id'=>6],
            ['plan_id'=>2,'Loss_id'=>7],
            ['plan_id'=>2,'Loss_id'=>8],
            ['plan_id'=>2,'Loss_id'=>9],
            ['plan_id'=>2,'Loss_id'=>10],

            ['plan_id'=>3,'Loss_id'=>11],
            ['plan_id'=>3,'Loss_id'=>12],
            ['plan_id'=>3,'Loss_id'=>13],
            ['plan_id'=>3,'Loss_id'=>14],
            ['plan_id'=>3,'Loss_id'=>15],

            ['plan_id'=>4,'Loss_id'=>16],
            ['plan_id'=>4,'Loss_id'=>17],
            ['plan_id'=>4,'Loss_id'=>18],
            ['plan_id'=>4,'Loss_id'=>19],
            ['plan_id'=>4,'Loss_id'=>20],
            ];
        DB::table('plan_loss')->insert($data);
    }
}
