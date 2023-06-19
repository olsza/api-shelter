<?php

use Database\Seeders\CatSeeder;

beforeEach(function () {
    $this->seed(CatSeeder::class);
});

test('returns a list of cats', function () {
    $response = $this->getJson('/api/cats');

    $response->assertStatus(200)
        ->assertJsonCount(7);
});
