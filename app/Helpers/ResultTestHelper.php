<?php

namespace App\Helpers;


class ResultTestHelper
{
    public static function testStress($totalScore, $answerIds)
    {
        // Menghitung rata-rata skor
        $averageScore = $totalScore / count($answerIds);

        // Menentukan tingkat stres berdasarkan rata-rata skor
        if ($averageScore <= 1.5) {
            $level = 'Rendah';
            $desc = 'Kamu mungkin merasa tenang dan rileks. Kamu memiliki kemampuan yang baik untuk menghadapi tantangan sehari-hari tanpa merasa kewalahan. Kamu mampu menjaga keseimbangan antara pekerjaan dan istirahat, serta memiliki cara efektif untuk mengelola stres.';
        } elseif ($averageScore <= 2.5) {
            $level = 'Sedang';
            $desc = 'Kamu mungkin merasa sedikit tegang dan tertekan. Kamu mungkin menghadapi beberapa tantangan yang memerlukan perhatian lebih, tetapi masih dapat mengelolanya dengan baik. Namun, Kamu mungkin merasa perlu waktu untuk bersantai dan mengembalikan energi. Penting untuk tetap memperhatikan tanda-tanda fisik dan emosional yang muncul akibat stres sedang.';
        } else {
            $level = 'Tinggi';
            $desc = 'Kamu mungkin merasa sangat tegang dan cemas. Situasi sehari-hari bisa terasa sangat menekan dan sulit diatasi. Kamu mungkin merasa kelelahan, kesulitan tidur, dan merasakan dampak fisik seperti sakit kepala atau gangguan pencernaan. Pada tingkat ini, penting untuk mencari dukungan dan mengambil langkah-langkah untuk mengurangi stres, seperti olahraga, meditasi, atau berkonsultasi dengan profesional.';
        }

        return [
            'level' => $level,
            'desc' => $desc
        ];
    }

    public static function testLoneliness($totalScore, $answerIds)
    {
        // Menghitung rata-rata skor
        $averageScore = $totalScore / count($answerIds);

        // Menentukan tingkat stres berdasarkan rata-rata skor
        if ($averageScore < 2) {
            $level = 'Tidak Kesepian';
            $desc = 'Kamu cenderung merasa nyaman dengan diri sendiri dan mampu menikmati waktu sendiri tanpa merasa kesepian. Kamu memiliki koneksi sosial yang memadai dan mungkin merasa bahagia dengan situasi Kamu saat ini.';
        } else {
            $level = 'Cenderung Kesepian';
            $desc = 'Kamu cenderung merasa kesepian secara teratur dan merasa kurang terhubung dengan orang lain. Perasaan ini bisa berdampak pada kesejahteraan mental dan emosional Kamu. Penting untuk mencari dukungan sosial dan mencari cara untuk mengatasi perasaan kesepian.';
        }

        return [
            'level' => $level,
            'desc' => $desc
        ];
    }

    public static function testLoveLanguage($answerScores, $totalScore, $answerIds)
    {
        // Menghitung frekuensi masing-masing nilai skor
        $scoreFrequencies = array_count_values($answerScores);

        // Mencari nilai skor dengan frekuensi tertinggi (modus)
        $mostFrequentScore = array_search(max($scoreFrequencies), $scoreFrequencies);

        // Menentukan jenis love language berdasarkan nilai skor yang paling sering muncul
        if ($mostFrequentScore === 1) {
            $level = 'Words of Affirmation';
            $desc = 'Kamu menghargai kata-kata yang penuh perhatian dan positif...';
        } elseif ($mostFrequentScore === 2) {
            $level = 'Quality Time';
            $desc = 'Kamu menghargai waktu yang dihabiskan bersama dengan seseorang...';
        } elseif ($mostFrequentScore === 3) {
            $level = 'Receiving Gifts';
            $desc = 'Kamu merasa dicintai melalui hadiah yang memiliki makna khusus...';
        } elseif ($mostFrequentScore === 4) {
            $level = 'Acts of Service';
            $desc = 'Kamu merasa dicintai melalui tindakan nyata yang menunjukkan perhatian dan dukungan...';
        } elseif ($mostFrequentScore === 5) {
            $level = 'Physical Touch';
            $desc = 'Kamu merasa dekat dan dicintai melalui sentuhan fisik...';
        } else {
            // Menghitung rata-rata skor
            $averageScore = $totalScore / count($answerIds);

            // Menentukan tingkat stres berdasarkan rata-rata skor
            if ($averageScore <= 1) {
                $level = 'Words of Affirmation';
                $desc = 'Kamu menghargai kata-kata yang penuh perhatian dan positif. Kamu merasa dicintai dan dihargai melalui ucapan pujian, kata-kata dorongan, dan apresiasi verbal. Komunikasi terbuka dan kata-kata yang menyenangkan membuat Kamu merasa lebih dekat dengan orang yang Kamu cintai.';
            } elseif ($averageScore <= 2) {
                $level = 'Quality Time';
                $desc = 'Kamu menghargai waktu yang dihabiskan bersama dengan seseorang yang Kamu cintai. Interaksi mendalam, perhatian penuh, dan waktu bersama menjadi penting bagi Kamu. Kamu merasa dekat dan terhubung saat menghabiskan waktu berkualitas bersama, tanpa gangguan.';
            } elseif ($averageScore <= 3) {
                $level = 'Receiving Gifts';
                $desc = ' Kamu merasa dicintai melalui hadiah yang memiliki makna khusus. Hadiah-hadiah tersebut adalah simbol perhatian dan tanda bahwa seseorang memikirkan Kamu. Kamu menghargai setiap hadiah, tidak hanya dari segi material, tetapi juga dari makna emosional yang terkait.';
            } elseif ($averageScore <= 4) {
                $level = 'Acts of Service';
                $desc = 'Kamu merasa dicintai melalui tindakan nyata yang menunjukkan perhatian dan dukungan. Bantuan dalam tindakan sehari-hari, tugas-tugas rumah tangga, atau tindakan baik lainnya adalah cara Kamu merasa diperhatikan. Tindakan tersebut membantu Kamu merasa lebih dekat dengan orang yang Kamu cintai.';
            } elseif ($averageScore <= 5) {
                $level = 'Physical Touch';
                $desc = 'Kamu merasa dekat dan dicintai melalui sentuhan fisik. Sentuhan, pelukan, dan kontak tubuh lainnya adalah cara Kamu merasakan ikatan emosional. Kontak fisik menciptakan rasa koneksi yang kuat dan kasih sayang yang mendalam.';
            }
        }

        return [
            'level' => $level,
            'desc' => $desc
        ];
    }
}
