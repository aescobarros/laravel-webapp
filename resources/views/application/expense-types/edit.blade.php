<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="container bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form class="w-100" action="{{ route('application.expense-types.update') }}" method="POST">
                    <div class="row p-6 text-gray-900">
                        <div class="col-6">
                                @csrf
                                @method('PUT')
                                <h4 class="d-flex flex-row justify-content-between">Ingresos</h4>
                                <ul>
                                @foreach($expenses as $expense)
                                    <li>
                                        <input type="text" class="form-control" name="expense_types[{{ $expense->id }}]" value="{{ $expense->name }}" />
                                    </li>     
                                        @if ($expense->expenseSubTypes()->get())
                                            <ul>
                                        @endif
                                        @foreach($expense->expenseSubTypes()->get() as $expenseSubType)
                                            <li>
                                                <input type="text" class="form-control" name="expense_sub_types[{{ $expenseSubType->id }}]" value="{{ $expenseSubType->name }}" />
                                            </li>                        
                                        @endforeach
                                        @if ($expense->expenseSubTypes()->get())
                                            </ul>
                                        @endif                   
                                @endforeach
                            
                                </ul>
                            </form>
                        </div>
                        <div class="col-6">     
                            <h4 class="d-flex flex-row justify-content-between">Gastos<button type="submit" class="btn"><i class="fas fa-save"></i></h4>
                            <ul>
                            @foreach($incomes as $income)
                                <input type="text" class="form-control" name="expense_types[{{ $income->id }}]" value="{{ $income->name }}" />
                                    @if ($income->expenseSubTypes()->get())
                                        <ul>
                                    @endif
                                    @foreach($income->expenseSubTypes()->get() as $incomeSubType)
                                        <li>
                                            <input type="text" class="form-control" name="expense_sub_types[{{ $incomeSubType->id }}]" value="{{ $incomeSubType->name }}" />
                                        </li>                        
                                    @endforeach
                                    @if ($income->expenseSubTypes()->get())
                                        </ul>
                                    @endif                         
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>