<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Datetime;

class Usuario extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'senha',
        'data_nascimento',
    ];

    /**
     * Get all the users separated by pages.
     *
     *
     * @return collection
     */
    public function getAllUsers(){
        return $this->paginate(10);
    }

    /**
     * Get user by id.
     *
     *
     * @return collection
     */
    public function getUserById($userId){
        return $this->find($userId);
    }

    /**
     * Store the user.
     *
     *
     * @return collection
     */
    public function store($user){
        return $this->create($user);
    }

    /**
     * Update the user.
     *
     *
     * @return collection
     */
    public function updateUser($user, $userId){
        return $this->where('id', $userId)
        ->update([
            'nome' => $user['nome'], 
            'email' => $user['email'],
            'senha' => $user['senha'],
            'data_nascimento' => $user['data_nascimento']
        ]);
    }
    
    /**
     * Delete the user.
     *
     *
     * @return collection
     */
    public function deleteUser($userId){
        return $this->where("id", $userId)->delete();
    }

    /**
     * Decrypt the password for the edit form.
     *
     *
     * @return collection
     */
    public function getSenha()
    {
        return Crypt::decryptString($this->senha);
    }

    /**
     * Applys the BR format for the date.
     *
     *
     * @return collection
     */
    public function getCreateDate()
    {
        $createdAtToDateTime = new DateTime($this->created_at);
        $createdAtToBr = $createdAtToDateTime->format('d/m/Y');
        return $createdAtToBr;
    }
}
