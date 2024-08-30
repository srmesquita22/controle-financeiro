@extends('layouts.app')

@section('content')
    <script>
        $(document).ready(function() {
            $('#valor').mask('#.##0,00', {
                reverse: true
            });
        });
    </script>

    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <!-- Formulário de criação de conta -->
        <form action="{{ route('contas.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-xl">
            @csrf
            <div class="mb-4">
                <label for="cliente_id" class="block text-gray-700 text-sm font-bold mb-2">Cliente</label>
                <select class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="cliente_id" name="cliente_id" required>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="titulo" class="block text-gray-700 text-sm font-bold mb-2">Título</label>
                <input type="text" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="titulo" name="titulo" required>
            </div>

            <div class="mb-4">
                <label for="descricao" class="block text-gray-700 text-sm font-bold mb-2">Descrição</label>
                <textarea class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="descricao" name="descricao" rows="3"></textarea>
            </div>

            <div class="mb-4">
                <label for="tipo" class="block text-gray-700 text-sm font-bold mb-2">Tipo</label>
                <select class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="tipo" name="tipo">
                    <option value="entrada">Entrada</option>
                    <option value="saida">Saída</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="valor" class="block text-gray-700 text-sm font-bold mb-2">Valor</label>
                <input type="text" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="valor" name="valor" placeholder="0,00" required>
            </div>

            <div class="mb-6">
                <label for="data" class="block text-gray-700 text-sm font-bold mb-2">Data</label>
                <input type="date" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="data" name="data" required>
            </div>

            <div class="flex justify-between">
                <div class="flex space-x-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Salvar
                    </button>
                    <a href="{{ route('contas.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline inline-block">
                        Voltar
                    </a>
                </div>
            </div>

        </form>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {
            $('#valor').mask('#.##0,00', {
                reverse: true
            });
        });
    </script>
    @endpush
@endsection
