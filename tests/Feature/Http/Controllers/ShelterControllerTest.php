<?php

use App\Models\Shelter;
use Database\Seeders\ShelterSeeder;

beforeEach(function () {
    $this->seed(ShelterSeeder::class);
});

test('returns a list of shelters', function () {
    $response = $this->getJson('/api/shelters');

    $response->assertStatus(200)
        ->assertJsonCount(2);
});

test('shows a specific shelter', function () {
    $response = $this->getJson('/api/shelters/2');

    $response->assertStatus(200)
        ->assertJson([
            'branch' => 'Branch 2',
        ]);
});

test('creates a new shelter branch', function () {
    $shelterData = [
        'branch' => 'New shelter branch',
        'address' => 5,
    ];

    $response = $this->postJson('/api/shelters', $shelterData);

    $response->assertStatus(201)
        ->assertJsonFragment($shelterData);

    $this->assertDatabaseHas('shelters', $shelterData);

    $this->expect(Shelter::count())->toBe(3);
});

test('updates a shelter', function () {
    $shelterData = [
        'branch' => 'Shelter branch 666',
        'address'  => 'shelters in WWW',
    ];

    $response = $this->putJson('/api/shelters/2', $shelterData);

    $response->assertStatus(200)
        ->assertJson($shelterData);

    $this->assertDatabaseHas('shelters',  array_merge($shelterData, ['id' => 2]));
});

test('deletes a shelter', function () {
    $response = $this->deleteJson('/api/shelters/2');

    $response->assertStatus(204);

    $this->assertDatabaseMissing('shelters', ['id' => 2]);

    $this->expect(Shelter::count())->toBe(1);
});
