<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            ['plan_id'=>1,'exercise_id'=>1],
            ['plan_id'=>1,'exercise_id'=>2],
            ['plan_id'=>1,'exercise_id'=>3],
            ['plan_id'=>1,'exercise_id'=>4],
            ['plan_id'=>1,'exercise_id'=>5],
            ['plan_id'=>1,'exercise_id'=>6],
            ['plan_id'=>1,'exercise_id'=>7],
            ['plan_id'=>1,'exercise_id'=>8],
            ['plan_id'=>1,'exercise_id'=>9],
            ['plan_id'=>1,'exercise_id'=>10],
            ['plan_id'=>1,'exercise_id'=>11],
            ['plan_id'=>1,'exercise_id'=>12],
            ['plan_id'=>1,'exercise_id'=>13],
            ['plan_id'=>1,'exercise_id'=>14],
            ['plan_id'=>1,'exercise_id'=>15],
            ['plan_id'=>1,'exercise_id'=>16],
            ['plan_id'=>1,'exercise_id'=>16],
            ['plan_id'=>1,'exercise_id'=>17],

            ['plan_id'=>2,'exercise_id'=>18],
            ['plan_id'=>2,'exercise_id'=>19],
            ['plan_id'=>2,'exercise_id'=>20],
            ['plan_id'=>2,'exercise_id'=>21],
            ['plan_id'=>2,'exercise_id'=>22],
            ['plan_id'=>2,'exercise_id'=>23],
            ['plan_id'=>2,'exercise_id'=>24],
            ['plan_id'=>2,'exercise_id'=>25],
            ['plan_id'=>2,'exercise_id'=>26],
            ['plan_id'=>2,'exercise_id'=>27],
            ['plan_id'=>2,'exercise_id'=>28],
            ['plan_id'=>2,'exercise_id'=>29],
            ['plan_id'=>2,'exercise_id'=>30],
            ['plan_id'=>2,'exercise_id'=>31],
            ['plan_id'=>2,'exercise_id'=>32],
            ['plan_id'=>2,'exercise_id'=>33],
            ['plan_id'=>2,'exercise_id'=>34],

            ['plan_id'=>3,'exercise_id'=>35],
            ['plan_id'=>3,'exercise_id'=>36],
            ['plan_id'=>3,'exercise_id'=>37],
            ['plan_id'=>3,'exercise_id'=>38],
            ['plan_id'=>3,'exercise_id'=>39],
            ['plan_id'=>3,'exercise_id'=>40],
            ['plan_id'=>3,'exercise_id'=>41],
            ['plan_id'=>3,'exercise_id'=>42],
            ['plan_id'=>3,'exercise_id'=>43],
            ['plan_id'=>3,'exercise_id'=>44],
            ['plan_id'=>3,'exercise_id'=>45],
            ['plan_id'=>3,'exercise_id'=>46],
            ['plan_id'=>3,'exercise_id'=>47],
            ['plan_id'=>3,'exercise_id'=>48],
            ['plan_id'=>3,'exercise_id'=>49],
            ['plan_id'=>3,'exercise_id'=>50],
            ['plan_id'=>3,'exercise_id'=>51],

            ['plan_id'=>4,'exercise_id'=>52],
            ['plan_id'=>4,'exercise_id'=>53],
            ['plan_id'=>4,'exercise_id'=>54],
            ['plan_id'=>4,'exercise_id'=>55],
            ['plan_id'=>4,'exercise_id'=>56],
            ['plan_id'=>4,'exercise_id'=>57],
            ['plan_id'=>4,'exercise_id'=>58],
            ['plan_id'=>4,'exercise_id'=>59],
            ['plan_id'=>4,'exercise_id'=>60],
            ['plan_id'=>4,'exercise_id'=>61],
            ['plan_id'=>4,'exercise_id'=>62],
            ['plan_id'=>4,'exercise_id'=>63],
            ['plan_id'=>4,'exercise_id'=>64],
            ['plan_id'=>4,'exercise_id'=>65],
            ['plan_id'=>4,'exercise_id'=>66],
            ['plan_id'=>4,'exercise_id'=>67],
            ['plan_id'=>4,'exercise_id'=>68],
            ];
        DB::table('plan_exercise')->insert($data);
    }
}
