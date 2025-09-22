<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="container bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form class="w-100" action="{{ route('application.beneficiaries.update') }}" method="POST">
                    <div class="row p-6 text-gray-900">
                        <div class="col-6">
                                @csrf
                                @method('PUT')
                                <h4 class="d-flex flex-row justify-content-between">Beneficiarios<button type="submit" class="btn"><i class="fas fa-save"></i></h4>
                                <ul>
                                @foreach($beneficiaries as $beneficiary)
                                    <li>
                                        <input type="text" class="form-control my-2" name="beneficiaries[{{ $beneficiary->id }}]" value="{{ $beneficiary->name }}" />
                                    </li>                    
                                @endforeach
                            
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>