<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    /**
     *
     */
    public function test_login(): void
    {
        $user = User::factory()->create([
            'first_name' => 'Test',
        ]);
        $this->assertModelExists($user);
        $response = $this->actingAs($user)->get("/");
        $response->assertSuccessful(); //>=200 && <300
    }
}
