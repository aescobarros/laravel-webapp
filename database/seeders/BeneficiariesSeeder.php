<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Beneficiary;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BeneficiariesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $beneficiaries = [
            'Amazon',
            'Amazon Prime',
            'Neflix',
            'HBO',
            'Disney+',
            'Zara',
            'Mango',
            'Uniqlo',
            'Celio',
            'Pull & Bear',
            'H&M',
            'Libreria La Central',
            'Laie',
            'Magic Barcelona',
            'Norma Comics',
            'Gigamesh',
            'Decathlon',
            'Sprinter',
            'MediaMarkt',
            'PC Componentes',
            'Garmin',
            'Microsoft',
            'Google',
            'FNAC',
            'Sorli Discount',
            'Caprabo',
            'Bon Preu',
            'Mercadona'
        ];

        $users = User::all();

        foreach ($users as $user) {
            foreach ($beneficiaries as $beneficiary) {
                Beneficiary::create([
                    'name' => $beneficiary,
                    'user_id' => $user->id
                ]);
            }
        }
    }
}
