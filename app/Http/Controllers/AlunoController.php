<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Services\Operations;
use Illuminate\Http\Request;

class AlunoController extends Controller
{

    public function login(){
        return view('alunos/login');
    }

    public function cadastro() {
        return view('alunos/new_aluno');
    }

    public function salvar(Request $request) 
    {
       $request->validate([
            'name'     => 'required|string|max:50|unique:alunos,name', 
            'email'    => 'required|string|email|max:255|unique:alunos,email',
            'cpf'      => 'required|string|unique:alunos,cpf|digits:11',
            'password' => 'required|string|min:6',
        ], [
            'name.required'     => 'O campo Nome é obrigatório.',
            'name.max'          => 'O nome não pode ultrapassar 50 caracteres.',
            'name.unique'       => 'Este nome de usuário já está em uso.', // <-- Nova mensagem de erro
            'email.required'    => 'O campo E-mail é obrigatório.',
            'email.email'       => 'Digite um e-mail válido.',
            'email.unique'      => 'Este e-mail já está cadastrado.',
            'cpf.required'      => 'O campo CPF é obrigatório.',
            'cpf.unique'        => 'Este CPF já está cadastrado.',
            'password.required' => 'A senha é obrigatória.',
            'password.min'      => 'A senha deve ter no mínimo 6 caracteres.',
        ]);

        $cpfLimpo = preg_replace('/[^0-9]/', '', $request->cpf);

        Aluno::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'cpf'      => $cpfLimpo,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
        ]);

        return redirect('login');
    }

    public function loginSubmit(Request $request){

        $request->validate(
            [
                'name' => 'required|min:3',
                'password' => 'required|min:6',
            ],
            [
                'name.required' => 'O campo name é obrigatório.',
                'name.min' => 'O campo name deve ter no mínimo 3 caracteres',

                'password.required' => 'O campo password é obrigatório.',
                'password.min' => 'O campo password deve ter no mínimo 6 caracteres',

            ]
        );
        $name = $request->input('name');
        $password = $request->input('password');


        $aluno = Aluno::where('name',$name)
                    ->whereNull('deleted_at')
                    ->first();

        if(!$aluno){
            return redirect()->back()
                    ->withInput()
                    ->with('login_error','name ou password incorretos!');
        } else {
            if(!password_verify($password,$aluno->password)){
                return redirect()->back()
                        ->withInput()
                        ->with('login_error','name ou password incorretos!');
            }
        }
        
        $aluno->last_login = date('Y-m-d H:i:s');
        $aluno->save();
        session([
            'aluno' => [
                'id' => $aluno->id,
                'name' => $aluno->name,
            ]
        ]);

        return redirect()->route('alunos.index');

    }



    public function logout(){
        session()->forget('aluno');

       return redirect()->route('login');
    }

    public function editAluno($id)
    {
        // Desencripta o ID
        $decrypted_id = Operations::decryptId($id);
        
        // Busca o aluno
        $aluno = Aluno::find($decrypted_id);

        if(!$aluno) {
            return redirect()->route('alunos.index');
        }

        return view('alunos.edit-aluno', ['aluno' => $aluno]);
    }

    public function editAlunoSubmit(Request $request)
    {
        // Verifica se o ID foi enviado
        if ($request->aluno_id === null) {
            return redirect()->route('alunos.index');
        }

        $id = Operations::decryptId($request->aluno_id);

        // Validação
        $request->validate([
            'name'     => 'required|string|max:50',
            'email'    => 'required|string|email|max:255|unique:alunos,email,' . $id,
            'cpf'      => 'required|string|digits:11|unique:alunos,cpf,' . $id,
            'password' => 'nullable|string|min:6',
        ], [
            'name.required'     => 'O campo Nome é obrigatório.',
            'name.max'          => 'O nome não pode ultrapassar 50 caracteres.',
            'email.required'    => 'O campo E-mail é obrigatório.',
            'email.email'       => 'Digite um e-mail válido.',
            'email.unique'      => 'Este e-mail já está cadastrado.',
            'cpf.required'      => 'O campo CPF é obrigatório.',
            'cpf.unique'        => 'Este CPF já está cadastrado.',
            'password.min'      => 'A senha deve ter no mínimo 6 caracteres.',
        ]);

        $aluno = Aluno::find($id);
        
        if (!$aluno) {
            return redirect()->route('alunos.index');
        }

        $cpfLimpo = preg_replace('/[^0-9]/', '', $request->cpf);

        // Atualiza os dados
        $aluno->name  = $request->name;
        $aluno->email = $request->email;
        $aluno->cpf   = $cpfLimpo;
        
        if (!empty($request->password)) {
            $aluno->password = \Illuminate\Support\Facades\Hash::make($request->password);
        }

        $aluno->save();

        // Redireciona para a listagem de alunos
        return redirect()->route('alunos.index');
    }

    public function destroy($id)
    {
        $alunoId = Operations::decryptId($id);
        $aluno = Aluno::find($alunoId);
        return view('alunos.delete-aluno', ['aluno' => $aluno]);
    }

    public function deleteAlunoConfirm($id)
    {
        $alunoId = Operations::decryptId($id);
        $aluno = Aluno::find($alunoId);
        if (!$aluno) {
            return redirect()->route('alunos.index');
        }
        // Soft delete automático
        $aluno->delete();
        //$note->forcedelete();
        return redirect()->route('alunos.index');
    }
}
