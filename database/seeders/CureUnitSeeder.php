<?php

namespace Database\Seeders;

use App\Models\CureUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CureUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CureUnit::create(['name' => 'pcs']);
        CureUnit::create(['name' => 'botol']);
    }
}
