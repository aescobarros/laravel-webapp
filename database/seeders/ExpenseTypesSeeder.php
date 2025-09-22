<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ExpenseType;
use App\Models\ExpenseSubType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExpenseTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        $expenses = [
            'Transporte Público',
            'Teléfono',
            'Tabaco y Alcohol',
            'Suscripciones',
            'Supermercados',
            'Servicios' => [
                'Alquiler',
                'Agua',
                'Gas',
                'Electricidad'
            ],
            'Ropa y Complementos',
            'Regalos',
            'Otros Gastos',
            'Ocio',
            'Obras Benéficas',
            'Material Deportivo',
            'Material de Oficina',
            'Material de Aseo',
            'Libros',
            'Informática',
            'Impuestos' => [
                'Seguridad Social',
                'Retenciones',
                'Otros Impuestos',
                'Municipales',
                'IRPF'
            ],
            'Hobbies',
            'Gastos Médicos',
            'Educación',
            'Cargo de Servicio Bancario',
            'Calzado',
            'Bares y Restaurantes',
            'Ajustes'
        ];

        $incomes = [
            'Sueldo',
            'Regalos Recibidos',
            'Pensiones',
            'Pagas Extra',
            'Otros Ingresos',
            'Ingresos por Interesses' => [
                'Otros Intereses',
                'Intereses de Cuenta Corriente',
                'Intereses de Cuenta de Ahorros'
            ],
        ];

        foreach ($users as $user) {
            foreach ($expenses as $item => $expenseType) {
                $expense_type = ExpenseType::create([
                    'name' => is_array($expenseType) ? $item : $expenseType,
                    'expense' => 1,
                    'user_id' => $user->id
                ]);

                if (is_array($expenseType)) {
                    foreach($expenseType as $expenseSubType) {
                        ExpenseSubType::create([
                            'name' => $expenseSubType,
                            'expense' => 1,
                            'user_id' => $user->id,
                            'expense_type_id' => $expense_type->id
                        ]);
                    }
                }
            }

            foreach ($incomes as $item => $expenseType) {
                $expense_type = ExpenseType::create([
                    'name' => is_array($expenseType) ? $item : $expenseType,
                    'expense' => 0,
                    'user_id' => $user->id
                ]);

                if (is_array($expenseType)) {
                    foreach($expenseType as $expenseSubType) {
                        ExpenseSubType::create([
                            'name' => $expenseSubType,
                            'expense' => 0,
                            'user_id' => $user->id,
                            'expense_type_id' => $expense_type->id
                        ]);
                    }
                }
            }
        }
    }
}
