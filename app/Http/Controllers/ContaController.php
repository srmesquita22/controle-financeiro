<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use App\Models\Cliente;
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
        $clientes = Cliente::all();
        return view('contas.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'titulo' => 'required|max:255',
            'descricao' => 'required',
            'tipo' => 'required|in:entrada,saida',
            'valor' => 'required|string', // Aqui aceitamos valor como string
            'data' => 'required|date',
            'cliente_id' => 'required|exists:clientes,id', // Verifica se o cliente_id existe na tabela clientes
        ]);

        // Conversão do valor para formato numérico padrão
        $valorFormatado = str_replace(',', '.', str_replace('.', '', $validatedData['valor']));

        // Criação da conta com os dados validados
        $conta = new Conta();
        $conta->titulo = $validatedData['titulo'];
        $conta->descricao = $validatedData['descricao'];
        $conta->tipo = $validatedData['tipo'];
        $conta->valor = $valorFormatado; // Usando o valor formatado
        $conta->data = $validatedData['data'];
        $conta->cliente_id = $validatedData['cliente_id']; // Associa o cliente_id à nova conta
        $conta->save();

        // Redirecionamento para a lista de contas
        return redirect()->route('contas.index');
    }


    public function show(Conta $conta)
    {
        $conta->load('cliente');
        return view('contas.show', compact('conta'));
    }

    public function edit(Conta $conta)
    {
        $clientes = Cliente::all();
        return view('contas.edit', compact('conta', 'clientes'));
    }

    public function update(Request $request, Conta $conta)
    {
        // Valida os dados atualizados
        $validatedData = $request->validate([
            'titulo' => 'required|max:255',
            'descricao' => 'required',
            'tipo' => 'required|in:entrada,saida',
            'valor' => 'required|regex:/^\d+(\,\d{1,2})?$/',
            'data' => 'required|date',
            'cliente_id' => 'required|exists:clientes,id',
        ]);

        // Converte o valor para um formato numérico com ponto decimal
        $valorNumerico = str_replace(',', '.', $validatedData['valor']);

        // Atualiza a conta com os dados validados e convertidos
        $conta->update([
            'titulo' => $validatedData['titulo'],
            'descricao' => $validatedData['descricao'],
            'tipo' => $validatedData['tipo'],
            'valor' => $valorNumerico,
            'data' => $validatedData['data'],
            'cliente_id' => $validatedData['cliente_id'],
        ]);

        // Redirecionamento para a lista de contas
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
            $query->whereDate('data', '>=', $request->data_inicial);
        }

        // Filtrar por data final (menor ou igual)
        if ($request->filled('data_final')) {
            $query->whereDate('data', '<=', $request->data_final);
        }

        $contas = $query->get();

        $quantidadeContas = $contas->count();
        $valorTotalEntradas = $contas->where('tipo', 'entrada')->sum('valor');
        $valorTotalSaidas = $contas->where('tipo', 'saida')->sum('valor');

        return view('dashboard', compact('quantidadeContas', 'valorTotalEntradas', 'valorTotalSaidas'));
    }
    
}
