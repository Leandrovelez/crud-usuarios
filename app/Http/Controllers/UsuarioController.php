<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UsuarioRepository;
use Illuminate\Support\Facades\Crypt;

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
        $user['nome'] = $request->nome;
        $user['email'] = $request->email;
        $user['senha'] = Crypt::encryptString($request->senha);
        $user['data_nascimento'] = $request->data_nascimento;
        
        $save = $this->usuarioRepository->store($user);

        $response = [];
        if($save){
            $response['success'] = true;
            $response['message'] = "Usuário cadastrado com sucesso";
        } else {
            $response['success'] = true;
            $response['message'] = "Erro ao cadastrar o usuário";
        }
        
        return response()->json($response);
    }

    public function update(Request $request, $id){
        $user['nome'] = $request->nome;
        $user['email'] = $request->email;
        $user['senha'] = Crypt::encryptString($request->senha);
        $user['data_nascimento'] = $request->data_nascimento;
        
        $save = $this->usuarioRepository->updateUser($user, $id);
        $response = [];
        if($save){
            $response['success'] = true;
            $response['message'] = "Usuário atualizado com sucesso";
        } else {
            $response['success'] = true;
            $response['message'] = "Erro ao atualizar o usuário";
        }
        return response()->json($response);
    }

    public function delete($id){
        $user = $this->usuarioRepository->deleteUser($id);

        $response = [];
        if($user){
            $response['success'] = true;
            $response['message'] = "Usuário deletado com sucesso";
        } else {
            $response['success'] = true;
            $response['message'] = "Erro ao deletar o usuário";
        }
        return response()->json($response);
    }
}
