<?php

namespace App\Repositories;

use App\Models\Usuario;
 
class UsuarioRepository {

    public function getAllUsers(){
        $usuario = new Usuario;
        return $usuario->getAllUsers();
    }

    public function getUserById($userId){
        $usuario = new Usuario;
        return $usuario->getUserById($userId);
    }

    public function store($user){
        $usuario = new Usuario;
        return $usuario->store($user);
    }
    public function updateUser($user, $userId){
        $usuario = new Usuario;
        return $usuario->updateUser($user, $userId);
    }
    public function deleteUser($userId){
        $usuario = new Usuario;
        return $usuario->deleteUser($userId);
    }
}
