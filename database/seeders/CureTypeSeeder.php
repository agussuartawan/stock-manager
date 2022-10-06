<?php

namespace Database\Seeders;

use App\Models\CureType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CureTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CureType::create(['name' => 'Kapsul']);
    }
}
