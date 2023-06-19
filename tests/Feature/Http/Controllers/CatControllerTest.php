<?php

use App\Models\Cat;
use Database\Seeders\CatSeeder;

beforeEach(function () {
    $this->seed(CatSeeder::class);
});

test('returns a list of cats', function () {
    $response = $this->getJson('/api/cats');

    $response->assertStatus(200)
        ->assertJsonCount(7);
});

test('creates a new cat', function () {
    $catData = [
        'name' => 'New cat name',
        'age' => 5,
    ];

    $response = $this->postJson('/api/cats', $catData);

    $response->assertStatus(201)
        ->assertJsonFragment($catData);

    $this->assertDatabaseHas('cats', $catData);

    $this->expect(Cat::count())->toBe(8);
});

test('shows a specific cat', function () {
    $catData = Cat::factory()->create();

    $response = $this->getJson('/api/cats/' . $catData->id);

    $response->assertStatus(200)
        ->assertJson([
            'id' => $catData->id,
        ]);
});

test('updates a cat', function () {
    $catData = [
        'name' => 'Old cat',
        'age'  => 66,
    ];

    $response = $this->putJson('/api/cats/3', $catData);

    $response->assertStatus(200)
        ->assertJson($catData);

    $this->assertDatabaseHas('cats',  array_merge($catData, ['id' => 3]));
});

test('deletes a cat', function () {
    $response = $this->deleteJson('/api/cats/4');

    $response->assertStatus(204);

    $this->assertDatabaseMissing('cats', ['id' => 4]);

    $this->expect(Cat::count())->toBe(6);
});
