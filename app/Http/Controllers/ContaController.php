<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use Illuminate\Http\Request;

class ContaController extends Controller
{
    public function index()
{
    $contas = Conta::all();
    return view('contas.index', compact('contas'));
}

public function create()
{
    return view('contas.create');
}


public function store(Request $request)
{
    // Validação dos dados
    $validatedData = $request->validate([
        'titulo' => 'required|max:255',
        'descricao' => 'required',
        'tipo' => 'required|in:entrada,saida',
        'valor' => 'required|numeric',
        'data' => 'required|date'
    ]);

    // Criação da conta com os dados validados
    Conta::create($validatedData);

    // Redirecionamento para a lista de contas
    return redirect()->route('contas.index');
}


public function show(Conta $conta)
{
    return view('contas.show', compact('conta'));
}

public function edit(Conta $conta)
{
    return view('contas.edit', compact('conta'));
}

public function update(Request $request, Conta $conta)
{
    // Atualiza a conta com os dados vindos do request
    $conta->update($request->all());

    // Redireciona para a lista de contas
    return redirect()->route('contas.index');
}


public function destroy(Conta $conta)
{
    $conta->delete();
    return redirect()->route('contas.index');
}

public function dashboard(Request $request)
{
    $query = Conta::query();

    // Filtrar por tipo
    if ($request->filled('tipo')) {
        $query->where('tipo', $request->tipo);
    }

    // Filtrar por data inicial (maior ou igual)
    if ($request->filled('data_inicial')) {
        $query->where('data', '>=', $request->data_inicial);
    }

    // Filtrar por data final (menor ou igual)
    if ($request->filled('data_final')) {
        $query->where('data', '<=', $request->data_final);
    }

    $contas = $query->get();

    // Continua com a agregação de dados e passa para a view...
    $quantidadeContas = $contas->count(); // Quantidade total de contas após o filtro
    $valorTotalEntradas = $contas->where('tipo', 'entrada')->sum('valor'); // Soma dos valores de 'entrada' após o filtro
    $valorTotalSaidas = $contas->where('tipo', 'saida')->sum('valor'); // Soma dos valores de 'saída' após o filtro

    // Passa as variáveis para a view
    return view('dashboard', compact('quantidadeContas', 'valorTotalEntradas', 'valorTotalSaidas'));
}

}
