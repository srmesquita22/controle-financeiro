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
        <h1 class="text-2xl font-bold">Detalhes da Conta: {{ $conta->titulo }}</h1>
        <form action="{{ route('contas_detalhes.store', $conta->id) }}" method="POST" class="mt-4">
            @csrf
            <input type="hidden" name="conta_id" id="conta_id" value="{{ $conta->id }}">
            <div class="mb-4">
                <label for="dt_pagamento" class="block text-gray-700">Data de Pagamento:</label>
                <input type="date" name="dt_pagamento" id="dt_pagamento" class="w-full border-gray-300 rounded-md"
                    required>
            </div>
            <div class="mb-4">
                <label for="descricao" class="block text-gray-700">Descrição:</label>
                <input type="text" name="descricao" id="descricao" class="w-full border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="valor" class="block text-gray-700 text-sm font-bold mb-2">Valor</label>
                <input type="text"
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="valor" name="valor" placeholder="0,00" required>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Adicionar
                Detalhe</button>
            <button onclick="window.history.back()"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Voltar</button>
        </form>

        <h2 class="text-xl font-bold mt-8">Detalhes Cadastrados:</h2>
        @if ($detalhes->isEmpty())
            <p>Nenhum detalhe encontrado.</p>
        @else
            <table class="min-w-full bg-white mt-4">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="text-left py-3 px-4">Data de Pagamento</th>
                        <th class="text-left py-3 px-4">Descrição</th>
                        <th class="text-left py-3 px-4">Valor</th>
                        <th class="text-left py-3 px-4">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @php
                        $detalhesOrdenados = $detalhes->sortBy('dt_pagamento');
                    @endphp

                    @foreach ($detalhesOrdenados as $detalhe)
                        <tr>
                            <td class="text-left py-3 px-4">
                                {{ \Carbon\Carbon::parse($detalhe->dt_pagamento)->format('d/m/Y') }}</td>
                            <td class="text-left py-3 px-4">{{ $detalhe->descricao }}</td>
                            <td class="text-left py-3 px-4">R$ {{ number_format($detalhe->valor, 2, ',', '.') }}</td>
                            <td class="text-left py-3 px-4">
                                <a href="{{ route('contas_detalhes.edit', [$conta->id, $detalhe->id]) }}"
                                    class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Editar</a>
                                <form action="{{ route('contas_detalhes.destroy', [$conta->id, $detalhe->id]) }}"
                                    method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded"
                                        onclick="return confirm('Tem certeza que deseja excluir este detalhe?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    @push('scripts')
        <script>
            document.getElementById('dt_pagamento').addEventListener('input', function (e) {
                const value = e.target.value;
                const year = value.split('-')[0];

                if (year.length > 4) {
                    e.target.value = value.substring(0, 4) + value.substring(5);
                }
            });

            $(document).ready(function() {
                $('#valor').mask('#.##0,00', {
                    reverse: true
                });
            });
        </script>
    @endpush
@endsection
