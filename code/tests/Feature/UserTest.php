<?php

namespace Tests\Feature\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_create(): void
    {
        $user = User::factory()->create([
            'first_name' => 'Test',
        ]);
        $this->assertModelExists($user);
        //  $response = $this->actingAs($user)->get("/");
        // $response->assertSuccessful(); //>=200 && <300
    }

    public function test_user_delete(): void
    {
        $user = User::factory()->create([
            'first_name' => 'Test'
        ]);
        $this->assertNotSoftDeleted($user);
    }
    public function test_softdelete(): void
    {
        $user = User::factory()->create(
            ['first_name' => 'Test']
        );
        $user->delete();
        $this->assertSoftDeleted($user);
    }
}
