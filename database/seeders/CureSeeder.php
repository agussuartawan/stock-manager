<?php

namespace Database\Seeders;

use App\Models\Cure;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cure::create([
            'cure_type_id' => 1,
            'cure_unit_id' => 1,
            'rack_id' => 1,
            'code' => 'OBT1001',
            'name' => 'Panadol Extra',
            'minimum_stock' => 10,
            'purchase_price' => 500,
            'selling_price' => 1500
        ]);
    }
}
