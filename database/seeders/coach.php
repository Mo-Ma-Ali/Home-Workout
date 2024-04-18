<?php

namespace Database\Seeders;

use App\Models\Coach as ModelsCoach;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class coach extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
    [
        'name' => 'ahmad',
        'email'=> 'coutchAhmed@gmail.com',
        'password' => Hash::make('12345678'),
    ],
     [
        'name' => 'samer',
        'email'=> 'coutchsamer@gmail.com',
        'password' => Hash::make('12345678'),
    ],
    [
        'name' => 'karem',
        'email'=> 'coutchkarem@gmail.com',
        'password' => Hash::make('12345678'),
    ]
    ];
        foreach ($data as $coachData) {
            $coach = User::create($coachData);
            $coach->coach()->create();
        }
    }

}
