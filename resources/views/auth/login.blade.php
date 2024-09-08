<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Controle Financeiro</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="flex items-center min-h-screen bg-gray-50">
        <div class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-lg shadow-xl">
            <div class="flex flex-col md:flex-row">

                <!-- Parte Esquerda: Imagem -->
                <div class="h-32 md:h-auto md:w-1/2">
                    <img class="object-cover w-full h-full" src="https://portal.fgv.br/sites/portal.fgv.br/files/styles/noticia_geral/public/noticias/09/23/emprestimo.jpg?itok=Kdswi0aP" alt="Sistema de Controle Financeiro" />
                </div>

                <!-- Parte Direita: Formulário de Login -->
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <!-- Logo ou Ícone aqui -->
                        <h1 class="mb-4 text-2xl font-bold text-center text-gray-700">
                            Sistema de Controle Financeiro
                        </h1>

                        <!-- Início do Formulário de Login do Laravel -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div>
                                <label class="block text-sm">Email</label>
                                <input id="email" name="email" type="email" required autofocus autocomplete="username"
                                       class="w-full px-4 py-2 text-sm border rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600"
                                       :value="old('email')"/>
                                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <label class="block text-sm">Password</label>
                                <input id="password" name="password" type="password" required autocomplete="current-password"
                                       class="w-full px-4 py-2 text-sm border rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600"/>
                                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                            </div>

                            <!-- Remember Me -->
                            <div class="mt-4">
                                <label class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                    class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg hover:bg-blue-700 focus:outline-none">
                                {{ __('Log in') }}
                            </button>

                            <!-- Forgot Password Link -->
                            @if (Route::has('password.request'))
                                <p class="mt-4">
                                    <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                </p>
                            @endif
                        </form>
                        <!-- Fim do Formulário de Login do Laravel -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
