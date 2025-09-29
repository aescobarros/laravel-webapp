<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $account_book->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="container bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row p-6 text-gray-900">
                    <div class="col-12">     
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Created At</th>
                                    <th>Date</th>
                                    <th>Expense Type</th>
                                    <th>Expense Sub Type</th>
                                    <th>value</th>
                                    <th>state</th>
                                <tr>
                            <tbody>
                                @foreach($account_book->expenses()->orderBy('date', 'DESC')->get() as $expense)
                                    <tr>
                                        <td>{{ $expense->created_at }}</td>
                                        <td>{{ $expense->date }}</td>
                                        <td>{{ $expense->expenseType()->name }}</td>
                                        <td>{{ $expense->amount }}</td>
                                    <tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>