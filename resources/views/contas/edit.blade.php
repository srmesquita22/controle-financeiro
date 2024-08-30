{{-- resources/views/contas/edit.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8 px-4">
    <h1 class="text-2xl font-bold mb-4">Editar Conta</h1>
    
    <!-- Formulário de edição de conta -->
    <form action="{{ route('contas.update', $conta->id) }}" method="POST" class="w-full max-w-lg">
        @csrf
        @method('PUT') <!-- Método HTTP necessário para a rota de atualização -->
        <div class="mb-4">
            <label for="cliente_id" class="block text-gray-700 text-sm font-bold mb-2">Cliente</label>
            <select class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="cliente_id" name="cliente_id">
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="titulo" class="block text-gray-700 text-sm font-bold mb-2">Título</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="titulo" name="titulo" value="{{ $conta->titulo }}" required>
        </div>

        <div class="mb-4">
            <label for="descricao" class="block text-gray-700 text-sm font-bold mb-2">Descrição</label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="descricao" name="descricao" rows="3" required>{{ $conta->descricao }}</textarea>
        </div>

        <div class="mb-4">
            <label for="tipo" class="block text-gray-700 text-sm font-bold mb-2">Tipo</label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="tipo" name="tipo">
                <option value="entrada" {{ $conta->tipo == 'entrada' ? 'selected' : '' }}>Entrada</option>
                <option value="saida" {{ $conta->tipo == 'saida' ? 'selected' : '' }}>Saída</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="valor" class="block text-gray-700 text-sm font-bold mb-2">Valor</label>
            <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="valor" name="valor" value="{{ $conta->valor }}" step="0.01" required>
        </div>

        <div class="mb-4">
            <label for="data" class="block text-gray-700 text-sm font-bold mb-2">Data</label>
            <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="data" name="data" value="{{ $conta->data }}" required>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Salvar Alterações
        </button>
        <a href="{{ route('contas.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline inline-block">
            Voltar
        </a>
    </form>
</div>


@endsection
