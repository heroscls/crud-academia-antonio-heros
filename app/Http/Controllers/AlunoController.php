<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Plano;
use App\Services\Operations;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::with('plano')
            ->latest()
            ->get();

        foreach ($alunos as $aluno) {
            $aluno->id_encriptado = Operations::encryptId($aluno->id);
        }

        return view('alunos.index', compact('alunos'));
    }

    public function create()
    {
        $planos = Plano::where('status', 'ativo')
            ->orderBy('nome')
            ->get();

        return view('alunos.create', compact('planos'));
    }

    public function store(Request $request)
    {
        $dados = $request->validate(
            [
                'nome' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:alunos,email',
                'telefone' => 'required|string|max:20',
                'data_nascimento' => 'required|date',
                'objetivo' => 'required|string|max:1000',
                'plano_id' => 'required|exists:planos,id',
            ],
            [
                'nome.required' => 'O nome é obrigatório.',
                'email.required' => 'O e-mail é obrigatório.',
                'email.email' => 'Informe um e-mail válido.',
                'email.unique' => 'Este e-mail já está cadastrado.',
                'telefone.required' => 'O telefone é obrigatório.',
                'data_nascimento.required' => 'A data de nascimento é obrigatória.',
                'data_nascimento.date' => 'Informe uma data válida.',
                'objetivo.required' => 'O objetivo é obrigatório.',
                'plano_id.required' => 'Selecione um plano.',
                'plano_id.exists' => 'O plano selecionado não existe.',
            ]
        );

        Aluno::create($dados);

        return redirect()
            ->route('alunos.index')
            ->with('success', 'Aluno cadastrado com sucesso!');
    }

    public function show($id)
    {
        $id = Operations::decryptId($id);

        if (!$id) {
            abort(404);
        }

        $aluno = Aluno::with('plano')
            ->findOrFail($id);

        $aluno->id_encriptado = Operations::encryptId($aluno->id);

        return view('alunos.show', compact('aluno'));
    }

    public function edit($id)
    {
        $id = Operations::decryptId($id);

        if (!$id) {
            abort(404);
        }

        $aluno = Aluno::findOrFail($id);

        $planos = Plano::where('status', 'ativo')
            ->orWhere('id', $aluno->plano_id)
            ->orderBy('nome')
            ->get();

        $aluno->id_encriptado = Operations::encryptId($aluno->id);

        return view('alunos.edit', compact('aluno', 'planos'));
    }

    public function update(Request $request, $id)
    {
        $id = Operations::decryptId($id);

        if (!$id) {
            abort(404);
        }

        $aluno = Aluno::findOrFail($id);

        $dados = $request->validate(
            [
                'nome' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:alunos,email,' . $aluno->id,
                'telefone' => 'required|string|max:20',
                'data_nascimento' => 'required|date',
                'objetivo' => 'required|string|max:1000',
                'plano_id' => 'required|exists:planos,id',
            ],
            [
                'nome.required' => 'O nome é obrigatório.',
                'email.required' => 'O e-mail é obrigatório.',
                'email.email' => 'Informe um e-mail válido.',
                'email.unique' => 'Este e-mail já está cadastrado.',
                'telefone.required' => 'O telefone é obrigatório.',
                'data_nascimento.required' => 'A data de nascimento é obrigatória.',
                'data_nascimento.date' => 'Informe uma data válida.',
                'objetivo.required' => 'O objetivo é obrigatório.',
                'plano_id.required' => 'Selecione um plano.',
                'plano_id.exists' => 'O plano selecionado não existe.',
            ]
        );

        $aluno->update($dados);

        return redirect()
            ->route('alunos.index')
            ->with('success', 'Aluno atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $id = Operations::decryptId($id);

        if (!$id) {
            abort(404);
        }

        $aluno = Aluno::findOrFail($id);

        $aluno->delete();

        return redirect()
            ->route('alunos.index')
            ->with('success', 'Aluno excluído com sucesso!');
    }
}