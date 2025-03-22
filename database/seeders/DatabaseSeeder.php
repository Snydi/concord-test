<?php

namespace Database\Seeders;

use App\Models\Reading;
use App\Models\ReadingType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        if (!Reading::exists() && !ReadingType::exists()) {
            $this->call([

                ReadingTypeSeeder::class,
                ReadingSeeder::class,
            ]);
        }
    }
}
