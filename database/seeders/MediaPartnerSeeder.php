<?php

namespace Database\Seeders;

use App\Models\MediaPartner;
use Illuminate\Database\Seeder;

class MediaPartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MediaPartner::create([
            'name' => 'Kreatif Media',
            'logo' => null,
        ]);

        MediaPartner::create([
            'name' => 'Event Pemuda',
            'logo' => null,
        ]);

        MediaPartner::create([
            'name' => 'Bandung Post',
            'logo' => null,
        ]);

        MediaPartner::create([
            'name' => 'Sinar Indonesia',
            'logo' => null,
        ]);
    }
}
