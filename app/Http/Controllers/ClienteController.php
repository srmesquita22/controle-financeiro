<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
{
    $clientes = Cliente::all();
    return view('clientes.index', compact('clientes'));
}

public function create()
{
    return view('clientes.create');
}


public function store(Request $request)
{
    // Validação dos dados
    $validatedData = $request->validate([
        'nome' => 'required|max:255',
        'email' => 'required',
        'telefone' => 'required',
        'ativo' => 'required|in:ativo,inativo'
    ]);

    // Criação do cliente com os dados validados
    Cliente::create($validatedData);

    // Redirecionamento para a lista de clientes
    return redirect()->route('clientes.index');
}


public function show(Cliente $cliente)
{
    return view('clientes.show', compact('cliente'));
}

public function edit(Cliente $cliente)
{
    return view('clientes.edit', compact('cliente'));
}

public function update(Request $request, Cliente $cliente)
{
    // Atualiza a cliente com os dados vindos do request
    $cliente->update($request->all());

    // Redireciona para a lista de clientes
    return redirect()->route('clientes.index');
}


public function destroy(Cliente $cliente)
{
      // Verifica se o cliente possui contas associadas
    if ($cliente->contas()->exists()) {
        return back()->with('error', 'Este cliente não pode ser excluído pois possui contas associadas.');
    }

    // Caso não tenha contas associadas, exclui o cliente
    $cliente->delete();

    return redirect()->route('clientes.index')->with('success', 'Cliente excluído com sucesso.');
}

public function dashboard(Request $request)
{
    $query = Cliente::query();

    // Filtrar por ativo
    if ($request->filled('ativo')) {
        $query->where('ativo', $request->ativo);
    }

    $clientes = $query->get();

    // Continua com a agregação de dados e passa para a view...
    $quantidadeClientes = Cliente::count(); // Quantidade total de clientes sem filtro

    $quantidadeClientes = $clientes->count(); // Quantidade total de clientes após o filtro
    $valorTotalEntradas = $clientes->where('ativo', 'ativo')->sum('valor'); // Soma dos valores de 'ativo' após o filtro
    $valorTotalSaidas = $clientes->where('ativo', 'inativo')->sum('valor'); // Soma dos valores de 'saída' após o filtro

    // Passa as variáveis para a view
    return view('dashboard', compact('quantidadeClientes', 'valorTotalEntradas', 'valorTotalSaidas'));
}

}
