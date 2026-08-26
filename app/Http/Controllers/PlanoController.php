<?php

namespace App\Http\Controllers;

use App\Models\Plano;
use App\Services\Operations;
use Illuminate\Http\Request;

class PlanoController extends Controller
{
    public function index()
    {
        $planos = Plano::withCount('alunos')
            ->orderBy('nome')
            ->get();

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
        $dados = $request->validate(
            [
                'nome' => 'required|string|max:255',
                'descricao' => 'nullable|string|max:1000',
                'preco' => 'required|numeric|min:0',
                'duracao_dias' => 'required|integer|min:1',
                'status' => 'required|in:ativo,inativo',
            ],
            [
                'nome.required' => 'O nome do plano é obrigatório.',
                'preco.required' => 'O preço é obrigatório.',
                'preco.numeric' => 'O preço deve ser numérico.',
                'preco.min' => 'O preço não pode ser negativo.',
                'duracao_dias.required' => 'A duração é obrigatória.',
                'duracao_dias.integer' => 'A duração deve ser um número inteiro.',
                'duracao_dias.min' => 'A duração deve ser de pelo menos 1 dia.',
                'status.required' => 'O status é obrigatório.',
                'status.in' => 'O status selecionado é inválido.',
            ]
        );

        Plano::create($dados);

        return redirect()
            ->route('planos.index')
            ->with('success', 'Plano cadastrado com sucesso!');
    }

    public function show($id)
    {
        $id = Operations::decryptId($id);

        if (!$id) {
            abort(404);
        }

        $plano = Plano::withCount('alunos')
            ->findOrFail($id);

        $plano->id_encriptado = Operations::encryptId($plano->id);

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

        $dados = $request->validate(
            [
                'nome' => 'required|string|max:255',
                'descricao' => 'nullable|string|max:1000',
                'preco' => 'required|numeric|min:0',
                'duracao_dias' => 'required|integer|min:1',
                'status' => 'required|in:ativo,inativo',
            ],
            [
                'nome.required' => 'O nome do plano é obrigatório.',
                'preco.required' => 'O preço é obrigatório.',
                'preco.numeric' => 'O preço deve ser numérico.',
                'preco.min' => 'O preço não pode ser negativo.',
                'duracao_dias.required' => 'A duração é obrigatória.',
                'duracao_dias.integer' => 'A duração deve ser um número inteiro.',
                'duracao_dias.min' => 'A duração deve ser de pelo menos 1 dia.',
                'status.required' => 'O status é obrigatório.',
                'status.in' => 'O status selecionado é inválido.',
            ]
        );

        $plano->update($dados);

        return redirect()
            ->route('planos.index')
            ->with('success', 'Plano atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $id = Operations::decryptId($id);

        if (!$id) {
            abort(404);
        }

        $plano = Plano::findOrFail($id);

        if ($plano->alunos()->exists()) {
            return redirect()
                ->route('planos.index')
                ->with('error', 'Não é possível excluir um plano que possui alunos.');
        }

        $plano->delete();

        return redirect()
            ->route('planos.index')
            ->with('success', 'Plano excluído com sucesso!');
    }
}