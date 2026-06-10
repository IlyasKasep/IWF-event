<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Speaker;
use App\Models\Sponsor;
use App\Models\MediaPartner;
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

        if (Speaker::count() === 0) {
            $this->call([SpeakerSeeder::class]);
        }

        if (Sponsor::count() === 0) {
            // Note: SponsorSeeder truncates the table first, so we only run if count is 0
            $this->call([SponsorSeeder::class]);
        }

        if (MediaPartner::count() === 0) {
            $this->call([MediaPartnerSeeder::class]);
        }
    }
}
