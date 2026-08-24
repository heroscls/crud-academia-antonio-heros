<?php

namespace App\Http\Controllers;

use App\Models\Plano;
use Illuminate\Http\Request;

class PlanoController extends Controller
{
    public function index()
    {
        $planos = Plano::all();

        return view('planos.index', compact('planos'));
    }

    public function create()
    {
        return view('planos.create');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required',
            'descricao' => 'nullable',
            'preco' => 'required|numeric',
            'duracao_dias' => 'required|integer',
            'status' => 'required',
        ]);

        Plano::create($dados);

        return redirect('/planos');
    }

    public function show($id)
    {
        $plano = Plano::findOrFail($id);

        return view('planos.show', compact('plano'));
    }

    public function edit($id)
    {
        $plano = Plano::findOrFail($id);

        return view('planos.edit', compact('plano'));
    }

    public function update(Request $request, $id)
    {
        $plano = Plano::findOrFail($id);

        $plano->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'duracao_dias' => $request->duracao_dias,
            'status' => $request->status,
        ]);

        return redirect('/planos');
    }

    public function destroy($id)
    {
        $plano = Plano::findOrFail($id);

        $plano->delete();

        return redirect('/planos');
    }
}
