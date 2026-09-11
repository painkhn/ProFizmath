<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        User::factory()->create([
            'name' => 'Dima',
            'email' => 'dima@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('123123123')
        ]);
        User::factory()->create([
            'name' => 'Юлия Халтаева',
            'email' => 'u.khaltaeva@mail.ru',
            'role' => 'teacher',
            'password' => Hash::make('123123123')
        ]);
        User::factory()->create([
            'name' => 'Zalupa',
            'email' => 'zalupa@gmail.com',
            'role' => 'student',
            'password' => Hash::make('123123123')
        ]);
    }
}
