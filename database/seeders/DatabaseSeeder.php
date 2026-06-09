<?php

namespace Database\Seeders;

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

        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin@iwf.com'],
            [
                'name' => 'Administrator',
                'password' => bcrypt('adminiwf2026'),
            ]
        );

        $this->call([
            SpeakerSeeder::class,
            SponsorSeeder::class,
            MediaPartnerSeeder::class,
        ]);
    }
}
