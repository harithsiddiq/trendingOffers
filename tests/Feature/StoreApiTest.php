<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Store;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreApiTest extends TestCase
{
    use RefreshDatabase;

    protected function authenticate()
    {
        $user = User::factory()->create();
        $token = $user->createToken('test-token')->plainTextToken;
        return ['Authorization' => 'Bearer ' . $token];
    }

    public function test_can_list_stores()
    {
        Store::factory()->count(3)->create();
        $response = $this->getJson('/api/v1/stores', $this->authenticate());
        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    public function test_can_create_store()
    {
        $data = [
            'user_id' => \App\Models\User::factory()->create()->id,
            'region_id' => \App\Models\Region::factory()->create()->id,
            'category_id' => \App\Models\Category::factory()->create()->id,
            'name' => 'Test Store',
            'description' => 'A test store description.',
            'address' => '123 Main St',
            'lat' => 15.5000000,
            'lng' => 32.6000000,
            'is_published' => true,
            'open_date' => '2025-07-26',
            'logo_url' => 'https://example.com/logo.png',
        ];
        $response = $this->postJson('/api/v1/stores', $data, $this->authenticate());
        $response->assertStatus(201)
                 ->assertJsonFragment(['name' => 'Test Store']);
    }

    public function test_can_show_store()
    {
        $store = Store::factory()->create();
        $response = $this->getJson("/api/v1/stores/{$store->id}", $this->authenticate());
        $response->assertStatus(200)
                 ->assertJsonFragment(['id' => $store->id]);
    }

    public function test_can_update_store()
    {
        $store = Store::factory()->create();
        $data = ['name' => 'Updated Store'];
        $response = $this->putJson("/api/v1/stores/{$store->id}", $data, $this->authenticate());
        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => 'Updated Store']);
    }

    public function test_can_delete_store()
    {
        $store = Store::factory()->create();
        $response = $this->deleteJson("/api/v1/stores/{$store->id}", [], $this->authenticate());
        $response->assertStatus(204);
    }
}