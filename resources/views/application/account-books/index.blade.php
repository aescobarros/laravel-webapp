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
                        <h4 class="d-flex flex-row justify-content-between">Cuentas</h4>
                        <ul>
                        @foreach($account_books as $account_book)
                            <li>{{ $account_book->name }} <a href="{{ route('application.account-books.show', ['id' => $account_book->id]) }}"><i class="fas fa-eye"></i></a></</li>          
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>