<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContaDetalhe;
use App\Models\Conta;

class ContasDetalheController extends Controller
{
    // Mostrar todos os detalhes de uma conta específica
    public function index($contaId)
    {
        $conta = Conta::findOrFail($contaId);
        $detalhes = $conta->detalhes()->orderBy('dt_pagamento')->get();

        return view('contas.conta-detalhes', compact('conta', 'detalhes'));
    }

    // Mostrar o formulário para criar um novo detalhe e listar os detalhes existentes
    public function create($contaId)
    {
        $conta = Conta::findOrFail($contaId);
        $detalhes = ContaDetalhe::where('conta_id', $contaId)->get();

        return view('contas.conta-detalhes-create', compact('conta', 'detalhes'));
    }

    public function edit($contaId, $detalheId)
    {
        $conta = Conta::findOrFail($contaId);
        $detalhe = ContaDetalhe::findOrFail($detalheId);

        return view('contas.conta-detalhes-edit', compact('conta', 'detalhe'));
    }

    public function update(Request $request, $contaId, $detalheId)
    {
        $detalhe = ContaDetalhe::findOrFail($detalheId);

        // Converte o valor para um formato numérico com ponto decimal
        $valorNumerico = str_replace(',', '.', str_replace('.', '', $request->input('valor')));

        $detalhe->update([
            'dt_pagamento' => $request->input('dt_pagamento'),
            'descricao' => $request->input('descricao'),
            'valor' => $valorNumerico,
        ]);

        return redirect()->route('contas_detalhes.index', $contaId)->with('success', 'Detalhe da conta atualizado com sucesso');
    }

    public function destroy($contaId, $detalheId)
    {
        $detalhe = ContaDetalhe::findOrFail($detalheId);
        $detalhe->delete();

        return redirect()->route('contas_detalhes.index', $contaId)->with('success', 'Detalhe da conta excluído com sucesso');
    }

    // Armazenar um novo detalhe
    public function store(Request $request, $contaId)
    {
        // Verifica os dados recebidos do formulário
        // dd($request->all());

        $request->validate([
            'dt_pagamento' => [
                'required',
                'date',
                'regex:/^\d{4}-\d{2}-\d{2}$/', // Valida se a data está no formato YYYY-MM-DD
            ],
            'descricao' => 'required|string|max:255',
            'valor' => 'required',
        ]);

        // Converte o valor para um formato numérico com ponto decimal
        $valorNumerico = str_replace(',', '.', str_replace('.', '', $request->input('valor')));

        $conta = Conta::findOrFail($contaId);
        $detalhe = new ContaDetalhe([
            'conta_id' => $contaId, // Adiciona o ID da conta ao detalhe
            'dt_pagamento' => $request->dt_pagamento,
            'descricao' => $request->descricao,
            'valor' => $valorNumerico,
        ]);
        $conta->detalhes()->save($detalhe);

        return redirect()->route('contas_detalhes.create', $contaId)->with('success', 'Detalhe criado com sucesso.');
    }
}
