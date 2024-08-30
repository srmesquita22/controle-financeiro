{{-- resources/views/clientes/show.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="clienteiner mx-auto mt-8 px-4">
    <h1 class="text-2xl font-bold mb-4">Detalhes do Cliente</h1>
    
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h5 class="text-lg leading-6 font-medium text-gray-900">{{ $cliente->nome }}</h5>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ $cliente->email }}</p>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ $cliente->telefone }}</p>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">ATIVO/INATIVO</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $cliente->ativo }}</dd>
                </div>
            </dl>
        </div>
    </div>

    <a href="{{ route('clientes.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline inline-block mt-4">
        Voltar
    </a>
</div>
@endsection
