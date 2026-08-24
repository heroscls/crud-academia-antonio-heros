<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function cadastro() {
        return view('new_aluno');
    }

    public function salvar(Request $request) 
    {
        $request->validate([
            'name'     => 'required|string|max:50',
            'email'    => 'required|string|email|max:255|unique:alunos,email',
            'cpf'      => 'required|string|unique:alunos,cpf',
            'password' => 'required|string|min:6',
        ], [
            'name.required'     => 'O campo Nome é obrigatório.',
            'name.max'          => 'O nome não pode ultrapassar 50 caracteres.',
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
                'text_name' => 'required|min:3',
                'text_password' => 'required|min:8',
            ],
            [
                'text_name.required' => 'O campo name é obrigatório.',
                'text_name.min' => 'O campo name deve ter no mínimo 3 caracteres',

                'text_password.required' => 'O campo password é obrigatório.',
                'text_password.min' => 'O campo password deve ter no mínimo 8 caracteres',

            ]
        );
        $name = $request->input('text_name');
        $password = $request->input('text_password');


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

        return redirect('/index');

    }



    public function logout(){
        session()->forget('aluno');

       return redirect()->route('login');
    }
}
