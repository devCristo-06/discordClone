<?php

namespace Tests\Feature;

use App\Models\Server;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ServerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    // ----------------------------------------------------------------------
    /**
     * Test to verify if the user can create a server
     * @author Cristo
     * @return void
     */
    public function test_authenticated_user_can_create_a_server(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->postJson('/api/v1/servers', [
                'name_server' => 'Gaming',
                'description_server' => 'Server dedicato ai videogiochi',
                'genre' => 'Videogames',
            ]);

        $response->assertCreated();

        $this->assertDatabaseHas('servers', [
            'owner_id' => $user->id,
            'name_server' => 'Gaming',
        ]);
    }
    // ----------------------------------------------------------------------
    /**
     * Test to verify if the guest can create a server
     * @author Cristo
     * @return void
     */
    public function test_guest_cannot_create_a_server(): void
    {
        $response = $this->postJson('/api/v1/servers', [
            'name_server' => 'Example Guest',
        ]);
        // dd($response);
        $response->assertForbidden();
    }
    // ----------------------------------------------------------------------
    /**
     * Test to verify if the owner can update his server
     * @author Cristo
     * @return void
     */
    public function test_owner_can_update_server(): void
    {
        $user = User::factory()->create();

        $server = Server::factory()->create([
            'owner_id' => $user->id,
        ]);

        $response = $this->actingAs($user)
            ->putJson("/api/v1/servers/{$server->id}", [
                'name_server' => 'Nuovo nome',
            ]);

        $response->assertOk();

        $this->assertDatabaseHas('servers', [
            'id' => $server->id,
            'name_server' => 'Nuovo nome',
        ]);
    }
    // ----------------------------------------------------------------------
    /**
     * Test to verify if the non-owner cannot update his server
     * @author Cristo
     * @return void
     */
    public function test_non_owner_cannot_update_server(): void
    {
        $owner = User::factory()->create();
        $otherUser = User::factory()->create();

        $server = Server::factory()->create([
            'owner_id' => $owner->id,
        ]);

        $response = $this->actingAs($otherUser)
            ->putJson("/api/v1/servers/{$server->id}", [
                'name_server' => 'Tentativo hacker',
            ]);

        $response->assertForbidden();

        $this->assertDatabaseMissing('servers', [
            'id' => $server->id,
            'name_server' => 'Tentativo hacker',
        ]);
    }
    // ----------------------------------------------------------------------
    /**
     * Test to verify that the server needs the name to be created
     * @author Cristo
     * @return void
     */
    public function test_server_creation_requires_name(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->postJson('/api/v1/servers', [
                'description_server' => 'Server senza nome',
            ]);

        $response->assertUnprocessable();

        $response->assertJsonValidationErrors([
            'name_server',
        ]);

        $this->assertDatabaseMissing('servers', [
            'description_server' => 'Server senza nome',
        ]);
    }
    // ----------------------------------------------------------------------
    /**
     * Test to verify that the server cannot be created because of invalid data
     * @author Cristo
     * @return void
     */
    public function test_server_creation_rejects_invalid_data(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->postJson('/api/v1/servers', [
                'name_server' => 12345,
            ]);

        $response->assertUnprocessable();

        $response->assertJsonValidationErrors([
            'name_server',
        ]);

        $this->assertDatabaseMissing('servers', [
            'name_server' => 12345,
        ]);
    }
    // ----------------------------------------------------------------------
    /**
     * Test to verify if the user can see the list of servers
     * @author Cristo
     * @return void
     */
    public function test_user_can_view_servers(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/api/v1/servers');
        $response->assertOk();
    }
    // ----------------------------------------------------------------------
    /**
     * Test to verify if the user can see a single server
     * @author Cristo
     * @return void
     */
    public function test_user_can_view_a_server(): void
    {
        $user = User::factory()->create();

        $server = Server::factory()->create([
            'owner_id' => $user->id,
            'name_server' => 'Gaming',
        ]);

        $response = $this->actingAs($user)
            ->getJson("/api/v1/servers/{$server->id}");

        $response->assertOk();

        $response->assertJsonPath('data.id', $server->id);
        $response->assertJsonPath('data.name', 'Gaming');
    }
    // ----------------------------------------------------------------------
    /**
     * Test to verify if the owner can delete his server
     * @author Cristo
     * @return void
     */
    public function test_owner_can_delete_server(): void
    {
        $user = User::factory()->create();

        $server = Server::factory()->create([
            'owner_id' => $user->id,
        ]);

        $response = $this->actingAs($user)
            ->deleteJson("/api/v1/servers/{$server->id}");

        $response->assertNoContent();

        $this->assertSoftDeleted('servers', [
            'id' => $server->id,
        ]);
    }
    // ----------------------------------------------------------------------
    /**
     * Test to verify if non-owner cannot delete a server
     * @author Cristo
     * @return void
     */
    public function test_non_owner_cannot_delete_server(): void
    {
        $owner = User::factory()->create();
        $otherUser = User::factory()->create();

        $server = Server::factory()->create([
            'owner_id' => $owner->id,
        ]);

        $response = $this->actingAs($otherUser)
            ->deleteJson("/api/v1/servers/{$server->id}");

        $response->assertForbidden();

        $this->assertDatabaseMissing('servers', [
            'id' => $server->id,
            'name_server' => 'Tentativo hacker',
        ]);
    }
    // ----------------------------------------------------------------------
    /**
     * Test to verify if the deleted server has soft delete in record
     * @author Cristo
     * @return void
     */
    public function test_deleted_server_is_soft_deleted(): void
    {
        $user = User::factory()->create();

        $server = Server::factory()->create([
            'owner_id' => $user->id,
        ]);

        $response = $this->actingAs($user)
            ->deleteJson("/api/v1/servers/{$server->id}");

        $response->assertNoContent();

        $this->assertSoftDeleted('servers', [
            'id' => $server->id,
        ]);
    }
    // ----------------------------------------------------------------------
    /**
     * Test to verify if the list of servers are paginated
     * @author Cristo
     * @return void
     */
    public function test_servers_are_paginated(): void
    {
        $user = User::factory()->create();

        Server::factory()->count(25)->create([
            'owner_id' => $user->id,
        ]);

        $response = $this->actingAs($user)
            ->getJson('/api/v1/servers');

        $response->assertOk();

        $response->assertJsonStructure([
            'data',
            'links',
            'meta',
        ]);

        $response->assertJsonCount(20, 'data');
    }
    // ----------------------------------------------------------------------
    /**
     * Test to verify if the server has expected structure
     * @author Cristo
     * @return void
     */
    public function test_server_response_has_expected_structure(): void
    {
        $user = User::factory()->create();

        $server = Server::factory()->create([
            'owner_id' => $user->id,
            'name_server' => 'Gaming',
            'description_server' => 'Server dedicato ai videogiochi',
            'genre' => 'Videogames',
        ]);

        $response = $this->actingAs($user)
            ->getJson("/api/v1/servers/{$server->id}");

        $response->assertOk();

        $response->assertJsonStructure([
            'data' => [
                'id',
                'owner_id',
                'name',
                'description',
                'genre',
                'icon',
                'banner',
                'created_at',
                'updated_at',
            ],
        ]);
    }
}
