@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8 px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Contas</h1>
        <a href="{{ route('contas.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Adicionar Nova Conta</a>
    </div>

    @if($contas->isEmpty())
        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">Nenhuma conta cadastrada.</span>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Cliente</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Título</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Descrição</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Tipo</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Valor</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Data</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($contas as $conta)
                        <tr>
                            <td class="text-left py-3 px-4">
                                @if($conta->cliente)
                                    {{ $conta->cliente->nome }}
                                @else
                                    Cliente não encontrado
                                @endif
                            </td>
                            <td class="text-left py-3 px-4">{{ $conta->titulo }}</td>
                            <td class="text-left py-3 px-4">{{ $conta->descricao }}</td>
                            <td class="text-left py-3 px-4">
                                {{ $conta->tipo == 'entrada' ? 'Entrada' : ($conta->tipo == 'saida' ? 'Saída' : $conta->tipo) }}
                            </td>
                            <td class="text-left py-3 px-4">R$ {{ number_format($conta->valor, 2, ',', '.') }}</td>
                            <td class="text-left py-3 px-4">{{ \Carbon\Carbon::parse($conta->data)->format('d/m/Y') }}</td>
                            <td class="text-left py-3 px-4">
                                <div class="flex space-x-1">
                                    <a href="{{ route('contas.show', $conta->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Visualizar</a>
                                    <a href="{{ route('contas.edit', $conta->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Editar</a>
                                    <a href="{{ route('contas_detalhes.create', $conta->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Detalhes</a>
                                    <form action="{{ route('contas.destroy', $conta->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="return confirm('Tem certeza que deseja excluir esta conta?')">Excluir</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
