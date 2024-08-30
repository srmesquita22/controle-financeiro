{{-- resources/views/clientes/edit.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="clienteiner mx-auto mt-8 px-4">
    <h1 class="text-2xl font-bold mb-4">Editar Cliente</h1>
    
    <!-- Formulário de edição de cliente -->
    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST" class="w-full max-w-lg">
        @csrf
        @method('PUT') <!-- Método HTTP necessário para a rota de atualização -->
        
        <div class="mb-4">
            <label for="nome" class="block text-gray-700 text-sm font-bold mb-2">Nome</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nome" name="nome" value="{{ $cliente->nome }}" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" value="{{ $cliente->email }}" required>
        </div>

        <div class="mb-4">
            <label for="telefone" class="block text-gray-700 text-sm font-bold mb-2">Telefone</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="telefone" name="telefone" value="{{ $cliente->telefone }}" required>
        </div>

        <div class="mb-4">
            <label for="ativo" class="block text-gray-700 text-sm font-bold mb-2">Ativo/Inativo</label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="ativo" name="ativo">
                <option value="ativo" {{ $cliente->ativo == 'ativo' ? 'selected' : '' }}>Ativo</option>
                <option value="inativo" {{ $cliente->ativo == 'inativo' ? 'selected' : '' }}>Inativo</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Salvar Alterações
        </button>
        <a href="{{ route('clientes.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline inline-block mt-4">
            Voltar
        </a>
    </form>
</div>
@push('scripts')
        <script>
            $(document).ready(function() {
                $('#telefone').mask('(00) 0000-0000', {
                    reverse: false
                });

            });
        </script>
    @endpush
@endsection
