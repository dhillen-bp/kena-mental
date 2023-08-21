<?php

namespace Tests\Unit;

use App\Http\Controllers\PsychologistController;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertTrue;

class PsychologistTest extends TestCase
{

    /**
     * A basic unit test example.
     */
    public function test_return_view_success(): void
    {
        $psychologist = PsychologistController::isPsycholog();
        $response = assertTrue($psychologist);
    }
}
