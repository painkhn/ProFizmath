<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Subject::factory()->create([
            'title' => 'Физика'
        ]);
        Subject::factory()->create([
            'title' => 'Математика'
        ]);

        foreach (range(1, 11) as $number) {
            Grade::factory()->create([
                'value' => $number
            ]);
        }
    }
}
