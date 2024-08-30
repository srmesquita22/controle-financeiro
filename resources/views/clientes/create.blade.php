@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <!-- Formulário de criação de cliente -->
        <form action="{{ route('clientes.store') }}" method="POST"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-xl">
            @csrf
            <div class="mb-4">
                <label for="nome" class="block text-gray-700 text-sm font-bold mb-2">Nome</label>
                <input type="text"
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="nome" name="nome" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">E-mail</label>
                <input type="text"
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="email" name="email" required>
            </div>

            <div class="mb-4">
                <label for="telefone" class="block text-gray-700 text-sm font-bold mb-2">Telefone</label>
                <input type="text"
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="telefone" name="telefone" required>
            </div>

            <div class="mb-4">
                <label for="ativo" class="block text-gray-700 text-sm font-bold mb-2">Ativo</label>
                <select
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="ativo" name="ativo">
                    <option value="ativo">Ativo</option>
                    <option value="inativo">Inativo</option>
                </select>
            </div>

            <div class="flex justify-between">
                <div class="flex space-x-4">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Salvar
                    </button>
                    <a href="{{ route('clientes.index') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline inline-block">
                        Voltar
                    </a>
                </div>
            </div>

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
