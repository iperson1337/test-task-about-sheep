<?php

namespace Database\Seeders;

use App\Models\History;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        History::create(['day' => 1]);
    }
}
