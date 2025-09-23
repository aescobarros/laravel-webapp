<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\AccountBook;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccountBooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $books = [
            'CaixaBank S.A.',
            'Metalico'
        ];

        $users = User::all();

        $date = Carbon::now()->subMonths(3);

        foreach ($users as $user) {
            $x = 1;
            foreach ($books as $book) {
                AccountBook::create([
                    'name' => $book,
                    'user_id' => $user->id,
                    'opened_at' => $date,
                    'initial_position' => $x % 2 ? rand(1000,2000) : rand(20,50)
                ]);
            }
        }
    }
}
