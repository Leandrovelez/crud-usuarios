<?php

namespace App\Repositories;

use App\Models\Usuario;
 
class UsuarioRepository {

    /**
     * Instances the User model and returns the result of the getAllUsers() method
     *
     *
     * @return collection
     */
    public function getAllUsers(){
        $usuario = new Usuario;
        return $usuario->getAllUsers();
    }

    /**
     * Instances the User model and returns the result of the getUserById() method
     *
     *
     * @return collection
     */
    public function getUserById($userId){
        $usuario = new Usuario;
        return $usuario->getUserById($userId);
    }

    /**
     * Instances the User model and returns the result of the store() method
     *
     *
     * @return collection
     */
    public function store($user){
        $usuario = new Usuario;
        return $usuario->store($user);
    }

    /**
     * Instances the User model and returns the result of the updateUser() method
     *
     *
     * @return collection
     */
    public function updateUser($user, $userId){
        $usuario = new Usuario;
        return $usuario->updateUser($user, $userId);
    }

    /**
     * Instances the User model and returns the result of the deleteUser() method
     *
     *
     * @return collection
     */
    public function deleteUser($userId){
        $usuario = new Usuario;
        return $usuario->deleteUser($userId);
    }
}
