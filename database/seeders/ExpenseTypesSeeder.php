<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ExpenseType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExpenseTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $expenses = [
            'Alquiler de Vehículos',
            'Alquiler y Comunidad',
            'Bienestar y Belleza',
            'Bizum Realizado',
            'Cuotas y Suscripciones',
            'Dinero del Cajero',
            'Donaciones y Beneficiencia',
            'Educación',
            'Electrónica y Electrodomesticos',
            'Facturación y Comercio Exterior',
            'Gastos en hipotecas y préstamos',
            'Hogar',
            'Hoteles',
            'Impuestos y Multas',
            'Amortiz./Cancel. Préstamos',
            'Bolsa y Valores',
            'Depósitos y Huchas',
            'Fondos de Inversion',
            'Planes de pensión y Previsión',
            'Joyería y Relojería',
            'Libros, Prensa, Música y Películas',
            'Ocio',
            'Restaurantes',
            'Ropa y Calzado',
            'Salud',
            'Seguridad Social',
            'Seguros y Mutuas',
            'Servicios Varios',
            'Supers e Hipers',
            'Teléfono / Internet',
            'Transferencias Realizadas',
            'Traspasos Realizados',
            'Transporte',
            'Varios',
            'Viaje'
        ];

        $incomes = [
            'Bizum Recibido',
            'Facturación y Comercio Exterior',
            'Impuestos y Multas',
            'Ingresos de Efectivo/Cheques',
            'Ingresos de Hipotecas y Prestamos',
            'Ingresos Varios',
            'Intereses y Rendimientos',
            'Bolsa y Valores',
            'Depósitos y Huchas',
            'Fondos de Inversión',
            'Planes de Pensión y Previsión',
            'Nomina / Pension / Desempleo',
            'Transferencias Recibidas',
            'Traspasos Recibidos'
        ];

        foreach ($expenses as $item => $expenseType) {
            $expense_type = ExpenseType::create([
                'name' => is_array($expenseType) ? $item : $expenseType,
                'expense' => 1,
            ]);
        }

        foreach ($incomes as $item => $expenseType) {
            $expense_type = ExpenseType::create([
                'name' => is_array($expenseType) ? $item : $expenseType,
                'expense' => 0,
            ]);
        }
    }
}
