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
                        <h4 class="d-flex flex-row justify-content-between">Beneficiarios <a href="{{ route('application.beneficiaries.edit') }}"><i class="fas fa-edit"></i></a></h4>
                        <ul>
                        @foreach($beneficiaries as $beneficiary)
                            <li>{{ $beneficiary->name }}</li>          
                        @endforeach
                        </ul>
                    </div>
                    <div class="col-6">
                        <h6 class="form-label">Añadir Beneficiario</h6>
                        <form class="w-100" action="{{ route('application.beneficiaries.store') }}" method="POST">
                            @csrf
                            <div class="w-100 flex-row d-flex">
                                <input type="text" class="form-control" name="name">
                                <button type="submit" class="btn"><i class="fas fa-plus"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>