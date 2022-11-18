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

    public function getAllUsers(){
        return $this->paginate(10);
    }

    public function getUserById($userId){
        return $this->find($userId);
    }

    public function store($user){
        return $this->create($user);
    }

    public function updateUser($user, $userId){
        return $this->where('id', $userId)
        ->update([
            'nome' => $user['nome'], 
            'email' => $user['email'],
            'senha' => $user['senha'],
            'data_nascimento' => $user['data_nascimento']
        ]);
    }
    
    public function deleteUser($userId){
        return $this->where("id", $userId)->delete();
    }

    public function getSenha()
    {
        return Crypt::decryptString($this->senha);
    }

    public function getCreateDate()
    {
        $createdAtToDateTime = new DateTime($this->created_at);
        $createdAtToBr = $createdAtToDateTime->format('d/m/Y');
        return $createdAtToBr;
    }
}
