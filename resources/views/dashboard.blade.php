{{-- resources/views/dashboard.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Início do Formulário de Filtros --}}
            <div class="mb-4 bg-white dark:bg-gray-800 px-6 py-4 rounded-lg shadow-md">
                <form method="GET" action="{{ route('dashboard') }}" class="flex flex-wrap items-end">
                    <!-- Tipo -->
                    <div class="w-full md:w-auto mb-2 md:mb-0 md:mr-2">
                        <label for="tipo" class="block text-gray-700 text-sm font-bold mb-1">Tipo</label>
                        <select id="tipo" name="tipo"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                            <option value="">Todos</option>
                            <option value="entrada" {{ request('tipo') == 'entrada' ? 'selected' : '' }}>Entrada</option>
                            <option value="saida" {{ request('tipo') == 'saida' ? 'selected' : '' }}>Saída</option>
                        </select>
                    </div>

                    <!-- Data Inicial -->
                    <div class="w-full md:w-auto mb-2 md:mb-0 md:mr-2">
                        <label for="data_inicial" class="block text-gray-700 text-sm font-bold mb-1">Data Inicial</label>
                        <input type="date" id="data_inicial" name="data_inicial" value="{{ request('data_inicial') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    </div>
                    <!-- Data Final -->
                    <div class="w-full md:w-auto mb-2 md:mb-0 md:mr-2">
                        <label for="data_final" class="block text-gray-700 text-sm font-bold mb-1">Data Final</label>
                        <input type="date" id="data_final" name="data_final" value="{{ request('data_final') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    </div>
                    <!-- Botão de Submissão -->
                    <div class="w-full md:w-auto">
                        <button type="submit"
                            class="h-full text-sm font-medium text-white bg-blue-600 rounded-lg border border-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 w-full md:w-auto p-2">
                            Filtrar
                        </button>
                        <!-- Botão Limpar -->
                        <button>
                            <div class="w-full md:w-auto">
                                <a href="{{ route('dashboard') }}"
                                    class="h-full text-sm font-medium text-white bg-blue-600 rounded-lg border border-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 w-full md:w-auto p-2">
                                    Limpar
                                </a>
                            </div>
                        </button>

                    </div>
                </form>
            </div>
            {{-- Fim do Formulário de Filtros --}}


            <!-- Container para os cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                <!-- Card para a quantidade de contas -->
                <div class="bg-blue-500 p-6 rounded-lg shadow-md text-white">
                    <h2 class="text-lg font-semibold">Total de Contas</h2>
                    <p class="text-3xl font-bold mt-2">{{ $quantidadeContas }}</p>
                    <div class="flex items-center mt-4">
                        <span class="text-sm">Quantidade de contas registradas</span>
                    </div>
                </div>

                <!-- Card para o valor total de entradas -->
                <div class="bg-green-500 p-6 rounded-lg shadow-md text-white">
                    <h2 class="text-lg font-semibold">Entradas</h2>
                    <p class="text-3xl font-bold mt-2">R$ {{ number_format($valorTotalEntradas, 2, ',', '.') }}</p>
                    <div class="flex items-center mt-4">
                        <span class="text-sm">Valor total de contas de entrada</span>
                    </div>
                </div>

                <!-- Card para o valor total de saídas -->
                <div class="bg-red-500 p-6 rounded-lg shadow-md text-white">
                    <h2 class="text-lg font-semibold">Saídas</h2>
                    <p class="text-3xl font-bold mt-2">R$ {{ number_format($valorTotalSaidas, 2, ',', '.') }}</p>
                    <div class="flex items-center mt-4">
                        <span class="text-sm">Valor total de contas de saída</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
