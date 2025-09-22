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
                                @if ($expense->expenseSubTypes()->get())
                                    <ul>
                                @endif
                                @foreach($expense->expenseSubTypes()->get() as $expenseSubType)
                                    <li>
                                        {{ $expenseSubType->name }}
                                    </li>                        
                                @endforeach
                                @if ($expense->expenseSubTypes()->get())
                                    </ul>
                                @endif                   
                        @endforeach
                        </ul>
                    </div>
                    <div class="col-6">     
                        <h4 class="d-flex flex-row justify-content-between">Gastos <a href="{{ route('application.expense-types.edit') }}"><i class="fas fa-edit"></i></a></h4>
                        <ul>
                        @foreach($incomes as $income)
                            <li>{{ $income->name }}</li> 
                                    @if ($income->expenseSubTypes()->get())
                                    <ul>
                                @endif
                                @foreach($income->expenseSubTypes()->get() as $incomeSubType)
                                    <li>
                                        {{ $incomeSubType->name }}
                                    </li>                        
                                @endforeach
                                @if ($income->expenseSubTypes()->get())
                                    </ul>
                                @endif                         
                        @endforeach
                        </ul>
                    </div>
                    <div class="col-12">
                        <h6 class="form-label">Añadir Categoria</h6>
                        <form class="w-100 d-flex flex-row " action="{{ route('application.expense-types.store') }}" method="POST">
                            @csrf
                            <input type="text" class="form-control" name="name">
                            <fieldset">
                                <div class="d-flex flex-row align-items-center">
                                    <div class="form-check ms-3 me-3">
                                        <input class="form-check-input" type="radio" name="expense" id="flexRadio1" value="1">
                                        <label class="form-check-label" for="flexRadio1">
                                            Gasto
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="expense" id="flexRadio2" value="0">
                                        <label class="form-check-label" for="flexRadio2">
                                            Ingreso
                                        </label>
                                    </div>
                                    <button type="submit" class="btn"><i class="fas fa-plus"></i></button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="col-12">
                        <h6 class="form-label mt-4">Añadir Subcategoria</h6>
                        <form class="w-100" action="{{ route('application.expense-types.store-sub-category') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <select name="expense_type_id" class="select2 w-100">
                                    <option value="0"></option>
                                    @foreach($expense_types as $expense_type)
                                        <option value="{{ $expense_type->id }}">{{ $expense_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-100 d-flex flex-row">
                                <input type="text" class="form-control" name="name">
                                <button type="submit" class="btn"><i class="fas fa-plus"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
</x-app-layout>