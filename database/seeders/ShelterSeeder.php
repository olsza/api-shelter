<?php

namespace Database\Seeders;

use App\Models\Shelter;
use Illuminate\Database\Seeder;

class ShelterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shelter::factory(2)->create([
            'branch' => $this->getUniqueName(),
        ]);
    }

    private function getUniqueName(): string
    {
        static $counter = 1;

        return 'Branch ' . $counter++;
    }
}
