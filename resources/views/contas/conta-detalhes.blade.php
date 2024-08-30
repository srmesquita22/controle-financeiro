{{-- resources/views/contas/conta-detalhes.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8 px-4">
    <h1 class="text-2xl font-bold mb-6">Detalhes da Conta: {{ $conta->titulo }}</h1>

    <a href="{{ route('contas_detalhes.create', $conta->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4">Adicionar Detalhe</a>
    <a href="{{ route('contas_detalhes.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline inline-block">
        Voltar
    </a>

    @if ($detalhes->isEmpty())
        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">Nenhum detalhe encontrado.</span>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Data de Pagamento</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Descrição</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Valor</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($detalhes as $detalhe)
                        <tr>
                            <td class="text-left py-3 px-4">{{ \Carbon\Carbon::parse($detalhe->dt_pagamento)->format('d/m/Y') }}</td>
                            <td class="text-left py-3 px-4">{{ $detalhe->descricao }}</td>
                            <td class="text-left py-3 px-4">R$ {{ number_format($detalhe->valor, 2, ',', '.') }}</td>
                            <td class="text-left py-3 px-4">
                                <div class="flex space-x-1">
                                    <a href="{{ route('contas_detalhes.edit', [$conta->id, $detalhe->id]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Editar</a>
                                    <form action="{{ route('contas_detalhes.destroy', [$conta->id, $detalhe->id]) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="return confirm('Tem certeza que deseja excluir este detalhe?')">Excluir</button>
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
