<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\Role;
use App\Models\Grade;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        Grade::factory()->count(100)->create();

        User::create([
            'name' => 'M Iqbal Effendi',
            'username' => 'iqbaleff214',
            'password' => Hash::make('admin'),
            'role' => Role::ADMIN,
        ]);
    }
}
