<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        try {
            Role::create([
                'name' => 'admin'
            ]);
            Role::create([
                'name' => 'customer'
            ]);

            User::create([
                'name' => 'admin',
                'email' => 'admin@admin',
                'password' => Hash::make('123456789'),
                'role_id' => Role::where('name', 'admin')->first()->id,
                'phone' => '1234567890',
                'address' => 'xyz area'
            ]);
        } catch (Exception $e) {
            DB::rollback();
        }
    }
}
