<?php

namespace Database\Seeders;

use App\Models\Answer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $answers = [

            ['question_id' => '1', 'choice' => 'Tidak Setuju', 'score' => 1],
            ['question_id' => '1', 'choice' => 'Netral', 'score' => 2],
            ['question_id' => '1', 'choice' => 'Setuju', 'score' => 3],
            ['question_id' => '2', 'choice' => 'Tidak Setuju', 'score' => 1],
            ['question_id' => '2', 'choice' => 'Netral', 'score' => 2],
            ['question_id' => '2', 'choice' => 'Setuju', 'score' => 3],
            ['question_id' => '3', 'choice' => 'Tidak Setuju', 'score' => 1],
            ['question_id' => '3', 'choice' => 'Netral', 'score' => 2],
            ['question_id' => '3', 'choice' => 'Setuju', 'score' => 3],
            ['question_id' => '4', 'choice' => 'Tidak Setuju', 'score' => 1],
            ['question_id' => '4', 'choice' => 'Netral', 'score' => 2],
            ['question_id' => '4', 'choice' => 'Setuju', 'score' => 3],
            ['question_id' => '5', 'choice' => 'Tidak Setuju', 'score' => 1],
            ['question_id' => '5', 'choice' => 'Netral', 'score' => 2],
            ['question_id' => '5', 'choice' => 'Setuju', 'score' => 3],
            ['question_id' => '6', 'choice' => 'Sering', 'score' => 1],
            ['question_id' => '6', 'choice' => 'Kadang-Kadang', 'score' => 2],
            ['question_id' => '6', 'choice' => 'Jarang', 'score' => 3],
            ['question_id' => '6', 'choice' => 'Tidak Pernah', 'score' => 3],
            ['question_id' => '7', 'choice' => 'Sering', 'score' => 1],
            ['question_id' => '7', 'choice' => 'Kadang-Kadang', 'score' => 2],
            ['question_id' => '7', 'choice' => 'Jarang', 'score' => 3],
            ['question_id' => '7', 'choice' => 'Tidak Pernah', 'score' => 3],
            ['question_id' => '8', 'choice' => 'Sering', 'score' => 1],
            ['question_id' => '8', 'choice' => 'Kadang-Kadang', 'score' => 2],
            ['question_id' => '8', 'choice' => 'Jarang', 'score' => 3],
            ['question_id' => '8', 'choice' => 'Tidak Pernah', 'score' => 3],
            ['question_id' => '9', 'choice' => 'Sering', 'score' => 1],
            ['question_id' => '9', 'choice' => 'Kadang-Kadang', 'score' => 2],
            ['question_id' => '9', 'choice' => 'Jarang', 'score' => 3],
            ['question_id' => '9', 'choice' => 'Tidak Pernah', 'score' => 3],
            ['question_id' => '10', 'choice' => 'Sering', 'score' => 1],
            ['question_id' => '10', 'choice' => 'Kadang-Kadang', 'score' => 2],
            ['question_id' => '10', 'choice' => 'Jarang', 'score' => 3],
            ['question_id' => '10', 'choice' => 'Tidak Pernah', 'score' => 3],
            ['question_id' => '11', 'choice' => 'Mengatakan kata-kata manis dan pujian', 'score' => 1],
            ['question_id' => '11', 'choice' => 'Menghabiskan waktu bersama saya', 'score' => 2],
            ['question_id' => '11', 'choice' => 'Memberikan hadiah atau kejutan tak terduga', 'score' => 3],
            ['question_id' => '11', 'choice' => 'Membantu saya dengan tindakan nyata', 'score' => 4],
            ['question_id' => '11', 'choice' => 'Menyentuh atau berdekatan secara fisik', 'score' => 5],
            ['question_id' => '12', 'choice' => 'Mengungkapkan perasaannya kepada saya', 'score' => 1],
            ['question_id' => '12', 'choice' => 'Mengajak saya melakukan hal-hal bersama', 'score' => 2],
            ['question_id' => '12', 'choice' => 'Memberikan hadiah yang bermakna', 'score' => 3],
            ['question_id' => '12', 'choice' => 'Membantu saya menyelesaikan tugas-tugas', 'score' => 4],
            ['question_id' => '12', 'choice' => 'Menyentuh atau mendekati saya secara fisik', 'score' => 5],
            ['question_id' => '13', 'choice' => 'Mendengar kata-kata positif dan dorongan', 'score' => 1],
            ['question_id' => '13', 'choice' => 'Seseorang yang bersedia mendengarkan dan berbicara bersama saya', 'score' => 2],
            ['question_id' => '13', 'choice' => 'Mendapatkan kejutan atau hadiah untuk menyemangati', 'score' => 3],
            ['question_id' => '13', 'choice' => 'Seseorang yang bersedia membantu saya secara tulus', 'score' => 4],
            ['question_id' => '13', 'choice' => 'Mendapatkan dukungan fisik seperti pelukan', 'score' => 5],
            ['question_id' => '14', 'choice' => 'Mengucapkan kata-kata kasih sayang dan apresiasi', 'score' => 1],
            ['question_id' => '14', 'choice' => 'Meluangkan waktu untuk berbicara dan berinteraksi dengan saya', 'score' => 2],
            ['question_id' => '14', 'choice' => 'Memberikan hadiah yang menunjukkan perhatian khusus', 'score' => 3],
            ['question_id' => '14', 'choice' => 'Melakukan tindakan-tindakan baik untuk saya', 'score' => 4],
            ['question_id' => '14', 'choice' => 'Menyentuh atau mendekati saya dengan penuh kasih', 'score' => 5],
            ['question_id' => '15', 'choice' => 'Ada kata-kata pujian dan ucapan selamat', 'score' => 1],
            ['question_id' => '15', 'choice' => 'Seseorang menghabiskan waktu untuk merayakan bersama', 'score' => 2],
            ['question_id' => '15', 'choice' => 'Saya mendapatkan hadiah yang menggambarkan momen tersebut', 'score' => 3],
            ['question_id' => '15', 'choice' => 'Seseorang membantu mengatur dan merencanakan perayaan', 'score' => 4],
            ['question_id' => '15', 'choice' => 'Saya bisa merasakan kontak fisik dan kasih sayang', 'score' => 5],

        ];

        foreach ($answers as $answer) {
            Answer::create($answer);
        }
    }
}
