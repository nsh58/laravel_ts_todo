<?php

namespace Tests\Feature;

use App\Models\Listing;
use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Generator as Faker;

class ListingControllerTest extends TestCase
{
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

    public function test_create_listing()
    {
        $user = User::factory()->create([
            'password' => bcrypt('Test1234')
        ]);

        $response = $this->actingAs($user)->post('/listings', [
            'user_id' => $user->id,
            'title' => 'test_title',
        ]);

        $response->assertRedirect('/');
    }

    public function test_edit()
    {
        $user = User::factory()->create([
            'password' => bcrypt('Test1234')
        ]);

        $listing = Listing::factory()->create(['user_id' => $user->id ]);

        $response = $this->actingAs($user)->get('/listings/' . $listing->id );

        $response->assertStatus(200);
    }

    public function test_update()
    {
        $user = User::factory()->create([
            'password' => bcrypt('Test1234')
        ]);

        $listing = Listing::factory()->create(['user_id' => $user->id ]);

        $response = $this->actingAs($user)->post('/listings/update/', [
            'id' => $listing->id,
            'title' => 'edit_title',
        ]);

        $response->assertRedirect('/');
    }
}
