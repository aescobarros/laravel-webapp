<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="container bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row p-6 text-gray-900">
                    <div class="col-6">
                        <h4 class="d-flex flex-row justify-content-between">Ingresos</h4>
                        <ul>
                        @foreach($expenses as $expense)
                            <li>
                                {{ $expense->name }}
                            </li>                     
                        @endforeach
                        </ul>
                    </div>
                    <div class="col-6">     
                        <h4 class="d-flex flex-row justify-content-between">Gastos</h4>
                        <ul>
                        @foreach($incomes as $income)
                            <li>{{ $income->name }}</li>                       
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>