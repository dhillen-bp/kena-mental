<?php

namespace Database\Seeders;

use App\Models\Psychologist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PsychologistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Psychologist::create([
            'id' => 'P001',
            'name' => 'Dr. John Doe',
            'photo' => '',
            'biography' => 'Experienced psychologist with a focus on mental health.',
        ]);
    }
}
