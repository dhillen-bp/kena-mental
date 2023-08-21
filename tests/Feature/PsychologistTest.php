<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PsychologistTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $user = User::first();
        $this->actingAs($user);
    }

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_return_view_success()
    {
        $response = $this->get('psychologists');

        $response->assertViewIs('client.psychologists');
    }
}
