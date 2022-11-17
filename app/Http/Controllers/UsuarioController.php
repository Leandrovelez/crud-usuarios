<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UsuarioRepository;

class UsuarioController extends Controller
{
    private $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepository){
        $this->usuarioRepository = $usuarioRepository;
    }

    public function getAllUsers(){
        $users = $this->usuarioRepository->getAllUsers();
        
        return view('index', compact('users'));
    }

    public function create(){
        return view('create');
    }

    public function edit($usuarioId){
        $user = $this->usuarioRepository->getUserById($usuarioId);
        return view('edit', compact('user'));
    }

    public function store(Request $request){
        $user['nome'] = $request['nome'];
        $user['email'] = $request['email'];
        $user['senha'] = $request['senha'];
        $user['data_nascimento'] = $request['data_nascimento'];
        
        $save = $this->usuarioRepository->store($user);
        
        if($save){
            toastr()->success('Usuário cadastrado com sucesso!');
        } else {
            toastr()->error('Erro ao cadastrar o usuário!');
        }
        
        return redirect()->route('usuarios.index');
    }

    public function update(Request $request){
        $user['id'] = $request['id'];
        $user['nome'] = $request['nome'];
        $user['email'] = $request['email'];
        $user['senha'] = $request['senha'];
        $user['data_nascimento'] = $request['data_nascimento'];
        
        $save = $this->usuarioRepository->updateUser($user);
        
        if($save){
            toastr()->success('Usuário atualizado com sucesso!');
        } else {
            toastr()->error('Erro ao atualizar o usuário!');
        }

        return redirect()->route('usuarios.index');
    }

    public function delete($userId){
        $usuario = $this->usuarioRepository->deleteUser($userId);

        if($usuario){
            return "sucesso";
        } else {
            return "deu ruim";
        }
    }
}
