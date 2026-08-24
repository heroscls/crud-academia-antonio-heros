<?php

namespace App\Http\Controllers;

use App\Models\Plano;
use Illuminate\Http\Request;
use App\Services\Operations;

class PlanoController extends Controller
{
    public function index()
    {
        $planos = Plano::all();

        foreach ($planos as $plano) {
            $plano->id_encriptado = Operations::encryptId($plano->id);
        }

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
        $id = Operations::decryptId($id);

        if (!$id) {
            abort(404);
        }

        $plano = Plano::findOrFail($id);

        return view('planos.show', compact('plano'));
    }

    public function edit($id)
    {

        $id = Operations::decryptId($id);

        if (!$id) {
            abort(404);
        }

        $plano = Plano::findOrFail($id);

        $plano->id_encriptado = Operations::encryptId($plano->id);

        return view('planos.edit', compact('plano'));
    }

    public function update(Request $request, $id)
    {
        $id = Operations::decryptId($id);

        if (!$id) {
            abort(404);
        }

        $plano = Plano::findOrFail($id);

        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
            'duracao_dias' => 'required|integer|min:1',
            'status' => 'required|in:ativo,inativo',
        ]);

        $plano->update($dados);

        return redirect('/planos')
            ->with('success', 'Plano atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $id = Operations::decryptId($id);

        if (!$id) {
            abort(404);
        }

        $plano = Plano::findOrFail($id);

        $plano->delete();

        return redirect('/planos')
            ->with('success', 'Plano excluído com sucesso!');
    }
}
