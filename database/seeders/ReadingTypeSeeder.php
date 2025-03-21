<?php

namespace Database\Seeders;

use App\Models\Reading;
use App\Models\ReadingType;
use Illuminate\Database\Seeder;

class ReadingTypeSeeder extends Seeder
{
    public function run(): void
    {
        ReadingType::insert([
            [
                'id' => 1,
                'name' => 'temperature',
                'border_color' => 'purple',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'pressure',
                'border_color' => 'green',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'rotation',
                'border_color' => 'brown',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
