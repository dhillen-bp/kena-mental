<?php

namespace Database\Seeders;

use App\Models\PsychologistDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PsychologistDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PsychologistDetail::create([
            'psychologist_id' => 'P001',
            'university' => 'University of XYZ',
            'year' => 2010,
            'degree' => 'Ph.D. in Psychology',
            'topics' => 'Stress Management, Family Counseling',
        ]);
    }
}
