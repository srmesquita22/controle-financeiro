@extends('layouts.app')

@section('content')
<script>
    $(document).ready(function() {
        $('#valor').mask('#.##0,00', {
            reverse: true
        });
    });
</script>
<div class="container mx-auto mt-8 px-4">
    <h1 class="text-2xl font-bold">Editar Detalhe da Conta: {{ $conta->titulo }}</h1>

    <form action="{{ route('contas_detalhes.update', [$conta->id, $detalhe->id]) }}" method="POST" class="mb-6">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="dt_pagamento" class="block text-gray-700 text-sm font-bold mb-2">Data de Pagamento:</label>
            <input type="date" name="dt_pagamento" id="dt_pagamento" value="{{ $detalhe->dt_pagamento }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="descricao" class="block text-gray-700 text-sm font-bold mb-2">Descrição:</label>
            <input type="text" name="descricao" id="descricao" value="{{ $detalhe->descricao }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="valor" class="block text-gray-700 text-sm font-bold mb-2">Valor:</label>
            <input type="text" step="0.01" name="valor" id="valor" value="{{ $detalhe->valor }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Salvar Alterações</button>
        <a href="{{ route('contas.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline inline-block">
            Voltar
        </a>
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
