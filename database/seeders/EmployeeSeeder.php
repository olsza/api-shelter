<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::factory(2)->create();
        Employee::factory()->create([
            'name'  => 'Olsza',
            'phone' => null,
        ]);
    }
}
