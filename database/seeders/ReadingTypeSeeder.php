<?php

namespace Database\Seeders;

use App\Models\ReadingType;
use Illuminate\Database\Seeder;

class ReadingTypeSeeder extends Seeder
{
    public function run(): void
    {
        ReadingType::insert([
            [
                'name' => 'temperature',
                'border_color' => 'purple',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'pressure',
                'border_color' => 'green',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'rotation',
                'border_color' => 'brown',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
