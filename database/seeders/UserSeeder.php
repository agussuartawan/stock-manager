<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
			$cure = Permission::create(['name' => 'akses obat']);
			$supplier = Permission::create(['name' => 'akses supplier']);
			$customer = Permission::create(['name' => 'akses pelanggan']);
			$type = Permission::create(['name' => 'akses jenis obat']);
			$rack = Permission::create(['name' => 'akses rak obat']);
			$unit = Permission::create(['name' => 'akses unit obat']);
			$cure_in = Permission::create(['name' => 'akses obat masuk']);
			$cure_out = Permission::create(['name' => 'akses obat keluar']);
			$report = Permission::create(['name' => 'akses laporan']);

			$admin_role = Role::create(['name' => 'Administrator']);
			$warehouse_role = Role::create(['name' => 'Kepala Gudang']);
			$director_role = Role::create(['name' => 'Direktur']);

			$warehouse_role->syncPermissions([$cure, $type, $rack], $cure_in, $cure_out, $unit, $supplier, $customer);
			$director_role->syncPermissions([$report]);

			$admin = User::create([
				'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('password')
			]);

            $warehouse = User::create([
				'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password')
			]);

            $director = User::create([
				'name' => 'Direktur',
                'email' => 'direktur@gmail.com',
                'password' => Hash::make('password')
			]);

			$admin->assignRole($admin_role);
			$warehouse->assignRole($warehouse_role);
			$director->assignRole($director_role);
		});
    }
}