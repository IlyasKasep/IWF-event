<?php

namespace Database\Seeders;

use App\Models\Speaker;
use Illuminate\Database\Seeder;

class SpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Speaker::create([
            'name' => 'Drs. Budi Lukita',
            'title' => 'Praktisi Hypnosis & NLP',
            'pillar' => 'Inner Impact',
            'avatar' => null, // Initial avatar is null, uses initials fallback
        ]);

        Speaker::create([
            'name' => 'Linda Handayani S., M.Hum.',
            'title' => 'Dosen Senior ITB',
            'pillar' => 'Creative Impact',
            'avatar' => null,
        ]);

        Speaker::create([
            'name' => 'H. Iman Sulaeman',
            'title' => 'Direktur SDM PT. TIG',
            'pillar' => 'Future Impact',
            'avatar' => null,
        ]);
    }
}
