<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            // Stress Test
            [
                'test_id' => 'TS001',
                'content' => 'Saya merasa tegang dan cemas ketika menghadapi situasi yang menantang.',
            ],
            [
                'test_id' => 'TS001',
                'content' => 'Saya merasa kesulitan tidur dan sering terjaga di malam hari.',
            ],
            [
                'test_id' => 'TS001',
                'content' => 'Saya merasa sulit untuk fokus dan berkonsentrasi dalam pekerjaan atau aktivitas sehari-hari.',
            ],
            [
                'test_id' => 'TS001',
                'content' => 'Saya merasa lelah dan kelelahan bahkan setelah istirahat yang cukup.',
            ],
            [
                'test_id' => 'TS001',
                'content' => 'Saya merasa mudah marah atau tertekan oleh hal-hal kecil.',
            ],

            // Loneliness Test
            [
                'test_id' => 'TS002',
                'content' => 'Saya merasa nyaman dengan keheningan dan ketenangan.',
            ],
            [
                'test_id' => 'TS002',
                'content' => 'Saya merasa senang memiliki waktu sendiri untuk melakukan aktivitas yang saya nikmati.',
            ],
            [
                'test_id' => 'TS002',
                'content' => 'Saya merasa lebih baik jika memiliki beberapa teman yang bisa diajak mengobrol.',
            ],
            [
                'test_id' => 'TS002',
                'content' => 'Saya merasa mudah menjadi bagian dari kelompok pertemanan',
            ],
            [
                'test_id' => 'TS002',
                'content' => 'Saya tidak merasa kesulitan mendekati orang baru atau memulai percakapan.',
            ],

            // Love Language Test
            [
                'test_id' => 'TS003',
                'content' => 'Saya merasa paling dicintai ketika seseorang ...',
            ],
            [
                'test_id' => 'TS003',
                'content' => 'Saya merasa paling bahagia ketika seseorang ...',
            ],
            [
                'test_id' => 'TS003',
                'content' => 'Ketika saya merasa down, yang paling membantu saya adalah ...',
            ],
            [
                'test_id' => 'TS003',
                'content' => 'Saya merasa dihargai ketika seseorang ...',
            ],
            [
                'test_id' => 'TS003',
                'content' => 'Saat merayakan pencapaian atau momen istimewa, saya senang jika ...',
            ],

        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}
