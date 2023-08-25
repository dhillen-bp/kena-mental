<?php

namespace Database\Seeders;

use App\Models\MentalTest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MentalTestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tests = [
            [
                'id' => 'TS001',
                'title' => 'Stress Severity Tests',
                'desc' => 'This test can measure your stress levels. The results of this test will help you know the current state of your mental health.',
                'thumbnail' => 'stress_test.png',
            ],
            [
                'id' => 'TS002',
                'title' => 'Loneliness Test',
                'desc' => 'High levels of loneliness can have a negative impact on mental health. Check your loneliness levels to reduce this risk.',
                'thumbnail' => 'lonely_test.png',
            ],
            [
                'id' => 'TS003',
                'title' => 'Love Language Test',
                'desc' => 'Want to know how you and he want to be loved? Try this love language test for better understanding!',
                'thumbnail' => 'love_test.png',
            ],
        ];

        foreach ($tests as $test) {
            MentalTest::create($test);
        }
    }
}
