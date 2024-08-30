{{-- resources/views/clientes/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="clienteiner mx-auto mt-8 px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Clientes</h1>
        <a href="{{ route('clientes.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Adicionar Novo Cliente</a>
    </div>

    @if($clientes->isEmpty())
        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">Nenhum cliente cadastrado.</span>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Nome</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Telefone</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Ativo/Inativo</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Ações</th>

                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td class="text-left py-3 px-4">{{ $cliente->nome }}</td>
                            <td class="text-left py-3 px-4">{{ $cliente->email }}</td>
                            <td class="text-left py-3 px-4">{{ $cliente->telefone }}</td>
                            <td class="text-left py-3 px-4">
                                {{ $cliente->ativo == 'ativo' ? 'Ativo' : ($cliente->ativo == 'inativo' ? 'Inatívo' : $cliente->ativo) }}
                            </td>      
                            <td class="text-left py-2 px-4">
                                <div class="flex space-x-2">
                                    <a href="{{ route('clientes.show', $cliente->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Visualizar</a>
                                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Editar</a>
                                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="return confirm('Tem certeza que deseja excluir este cliente?')">Excluir</button>
                                    </form>
                                </div>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
</div>
@endsection
