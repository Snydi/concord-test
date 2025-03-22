<?php

namespace Database\Seeders;

use App\Models\Reading;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ReadingSeeder extends Seeder
{
    public function run(): void
    {
        Reading::insert([
            [
                'reading_type_id' => 1,
                'value' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'reading_type_id' => 1,
                'value' => 30,
                'created_at' => now()->subWeek(),
                'updated_at' => now()->subWeek(),
            ],
            [
                'reading_type_id' => 2,
                'value' => 5,
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ],
            [
                'reading_type_id' => 2,
                'value' => 7,
                'created_at' => now()->subMonth(),
                'updated_at' => now()->subMonth(),
            ],
            [
                'reading_type_id' => 3,
                'value' => 40,
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(10),
            ],
            [
                'reading_type_id' => 3,
                'value' => 10,
                'created_at' => now()->subMonths(2),
                'updated_at' => now()->subMonths(2),
            ],
        ]);
    }
}
