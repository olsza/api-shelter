<?php

use App\Models\Employee;
use Database\Seeders\EmployeeSeeder;
use Illuminate\Http\Response;

beforeEach(function () {
    $this->seed(EmployeeSeeder::class);
});

test('returns a list of employees', function () {
    $response = $this->getJson('/api/employees');

    $response->assertStatus(200)
        ->assertJsonCount(3);
});

test('creates a new employee', function () {
    $employeeData = [
        'name'  => 'New employee name',
        'phone' => '555-888-666',
    ];

    $response = $this->postJson('/api/employees', $employeeData);

    $response->assertStatus(201)
        ->assertJsonFragment($employeeData);

    $this->assertDatabaseHas('employees', $employeeData);

    $this->expect(Employee::count())->toBe(4);
});

test('shows a specific employee', function () {
    $employeeData = Employee::factory()->create();

    $response = $this->getJson('/api/employees/' . $employeeData->id);

    $response->assertStatus(200)
        ->assertJson([
            'id' => $employeeData->id,
        ]);
});

test('updates a employee', function () {
    $employeeData = [
        'name'  => 'Old Olsza',
        'phone' => '666-7777-44',
    ];

    $response = $this->putJson('/api/employees/2', $employeeData);

    $response->assertStatus(200)
        ->assertJson($employeeData);

    $this->assertDatabaseHas('employees',  array_merge($employeeData, ['id' => 2]));
});

test('deletes a employee', function () {
    $response = $this->deleteJson('/api/employees/1');

    $response->assertStatus(204);

    $this->assertDatabaseMissing('employees', ['id' => 1]);

    $this->expect(Employee::count())->toBe(2);
});

test('validates the request data for creating a employee - name is required', function () {
    $invalidData = [
        'name' => '',
    ];

    $response = $this->postJson('/api/employees', $invalidData);

    $response->assertStatus(Response::HTTP_BAD_REQUEST)
        ->assertJsonValidationErrors(['name']);
});

test('validates the request data for creating a employee - phone is required', function () {
    $invalidData = [
        'name'  => 'Error employee',
        'phone' => '',
    ];

    $response = $this->postJson('/api/employees', $invalidData);

    $response->assertStatus(Response::HTTP_BAD_REQUEST)
        ->assertJsonValidationErrors(['phone']);
});

test('validates the request data for creating a employee - phone is too long', function () {
    $invalidData = [
        'name'  => 'Error employee',
        'phone' => '12345678901234567890123456',
    ];

    $response = $this->postJson('/api/employees', $invalidData);

    $response->assertStatus(Response::HTTP_BAD_REQUEST)
        ->assertJsonValidationErrors(['phone']);
});

test('validates the request data for update a employee - name is required', function () {
    $invalidData = [
        'name' => '',
    ];

    $response = $this->putJson('/api/employees/1', $invalidData);

    $response->assertStatus(Response::HTTP_BAD_REQUEST)
        ->assertJsonValidationErrors(['name']);
});

test('validates the request data for update a employee - phone is required', function () {
    $invalidData = [
        'name'  => 'update employee',
        'phone' => '',
    ];

    $response = $this->putJson('/api/employees/1', $invalidData);

    $response->assertStatus(Response::HTTP_BAD_REQUEST)
        ->assertJsonValidationErrors(['phone']);
});

test('validates the request data for update a employee - phone is too long', function () {
    $invalidData = [
        'name'  => 'update employee',
        'phone' => '12345678901234567890123456',
    ];

    $response = $this->putJson('/api/employees/1', $invalidData);

    $response->assertStatus(Response::HTTP_BAD_REQUEST)
        ->assertJsonValidationErrors(['phone']);
});
