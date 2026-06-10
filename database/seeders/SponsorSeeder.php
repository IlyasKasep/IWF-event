<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sponsor::truncate();

        Sponsor::create([
            'name' => 'Bank Mandiri',
            'tier' => 'platinum',
            'price' => 20000000,
            'description' => 'Kemitraan Utama Sponsor Platinum IWF 2026.',
            'logo' => null,
        ]);

        Sponsor::create([
            'name' => 'Indofood',
            'tier' => 'gold',
            'price' => 12000000,
            'description' => 'Kemitraan Gold Sponsor IWF 2026.',
            'logo' => null,
        ]);

        Sponsor::create([
            'name' => 'Kopi Kenangan',
            'tier' => 'bronze',
            'price' => 5000000,
            'description' => 'Kemitraan Bronze Sponsor IWF 2026.',
            'logo' => null,
        ]);
    }
}
