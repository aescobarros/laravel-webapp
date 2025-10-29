<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Database\Seeders\ExpenseTypesSeeder;
use Database\Seeders\BeneficiariesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Artisan::call('db:seed', ['--class' => RolesAndPermissionsSeeder::class]);

       $user = User::factory()->create([
            'name' => 'Alex Escobar Ros',
            'email' => 'a.escobar.ros@gmail.com',
        ]);

        $user->assignRole('admin');

        $user = User::factory()->create([
            'name' => 'AER',
            'email' => 'a.escobar.ros@outlook.com',
        ]);

        $user->assignRole('user');

        User::factory(35)->create()->each(function ($user) {
            $user->assignRole('user');
        });

        Artisan::call('db:seed', ['--class' => ExpenseTypesSeeder::class]);
        Artisan::call('db:seed', ['--class' => BeneficiariesSeeder::class]);


    }
}
