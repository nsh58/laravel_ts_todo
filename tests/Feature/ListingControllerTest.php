<?php

namespace Tests\Feature;

use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Generator as Faker;

class ListingControllerTest extends TestCase
{
    use HasFactory;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_listing()
    {
        $user = User::factory()->create([
            'password' => bcrypt('Test1234')
        ]);

        $response = $this->actingAs($user)->get('/');

        $response->assertStatus(200);
    }

    public function test_new()
    {
        $user = User::factory()->create([
            'password' => bcrypt('Test1234')
        ]);

        $response = $this->actingAs($user)->get('/new');

        $response->assertStatus(200);
    }

}
