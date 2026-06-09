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
            'name' => 'Bronze',
            'tier' => 'bronze',
            'price' => 5000000,
            'description' => 'Penempatan logo (kecil), penyebutan oleh MC, dokumentasi media sosial kolektif, dan sertifikat resmi mitra.',
            'logo' => null,
        ]);

        Sponsor::create([
            'name' => 'Gold',
            'tier' => 'gold',
            'price' => 12000000,
            'description' => 'Penempatan logo (sedang), dedicated post di media sosial, product review/ad-libs utama, dan sertifikat apresiasi eksklusif.',
            'logo' => null,
        ]);

        Sponsor::create([
            'name' => 'Platinum',
            'tier' => 'platinum',
            'price' => 20000000,
            'description' => 'Penempatan logo (besar), kolaborasi konten penuh, slot presentasi brand pada webinar, product sampling, dan kemitraan tahunan.',
            'logo' => null,
        ]);
    }
}
