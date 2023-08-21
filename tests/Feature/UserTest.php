<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    // like a constructor
    // protected function setUp(): void
    // {
    //     parent::setUp();
    //     var_dump('setup');
    // }

    // //
    // protected function tearDown(): void
    // {
    //     parent::tearDown();
    //     var_dump('end');
    // }

    // /**
    //  * A basic feature test example.
    //  * @group test1
    //  */
    // public function test_example(): void
    // {
    //     var_dump('test 1');
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    /**
     * A basic feature test example.
     * @group test2
     */
    public function test_check_http_method_get_success(): void
    {

        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_check_http_method_failed(): void
    {

        $response = $this->put('/login');

        $response->assertStatus(405);
    }

    public function test_return_view_success()
    {
        $response = $this->get(route('login'));

        $response->assertViewIs('auth.login');
    }

    public function test_return_view_not_found()
    {
        $response = $this->get('/logins');

        $response->assertStatus(404);
    }
}
