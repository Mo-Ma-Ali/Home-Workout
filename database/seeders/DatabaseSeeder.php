<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CateProduct;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            LevelSeeder::class,
            CategorySeeder::class,
           coach::class,
            ExerciseSeeder::class,
            PlanSeeder::class,
            PlanExerciseSeeder::class,
            WeightLossSeeder::class,
            PlanWeightLossSeeder::class,
            CateProductSeeder::class,
            ProductSeeder::class,
        ]);
        $user=\App\Models\User::create([
            'name' => 'admin',
           'email' => 'admin@gmail.com',
           'password' => Hash::make('12345678'),
       ]);
       $user->admin()->create();
    }
}
