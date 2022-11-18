<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UsuarioRepository;
use Illuminate\Support\Facades\Crypt;

class UsuarioController extends Controller
{
    private $usuarioRepository;

    /**
     * Creates the UserRepository
     *
     */
    public function __construct(UsuarioRepository $usuarioRepository){
        $this->usuarioRepository = $usuarioRepository;
    }

    /**
     * Return the index view with all users
     *
     */
    public function getAllUsers(){
        $users = $this->usuarioRepository->getAllUsers();
        
        return view('index', compact('users'));
    }

    /**
     * Return the create view
     *
     */
    public function create(){
        return view('create');
    }

    /**
     * Return the edit view
     *
     *@param integer $usuarioId is the Id of the user
     */
    public function edit($usuarioId){
        $user = $this->usuarioRepository->getUserById($usuarioId);
        return view('edit', compact('user'));
    }

    /**
     * Store the user and return a json with the result and messsage
     *
     *@param Request $request
     *
     * @return json
     */
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

    /**
     * Update the user and return a json with the result and messsage
     *
     *@param integer $id is the Id of the user, Request $request
     * 
     * @return json
     */
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

    /**
     * Delete the user and return a json with the result and messsage
     *
     *@param integer $id is the Id of the user
     * 
     * @return json
     */
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
