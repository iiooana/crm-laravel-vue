<?php

namespace Tests\Feature\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AppTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_response_application(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302);//login page
    }
}
