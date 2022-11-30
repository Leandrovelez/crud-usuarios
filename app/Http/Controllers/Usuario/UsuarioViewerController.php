<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Repositories\Usuario\UsuarioRepositoryContract;

class UsuarioViewerController extends Controller
{
    /**
     * @var UsuarioRepositoryContract
     */
    private $usuarioRepository;

    /**
     * @param UsuarioRepositoryContract $usuarioRepository
     */
    public function __construct(UsuarioRepositoryContract $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    /**
     * Return the index view with all users
     */
    public function getAllUsers()
    {
        $users = $this->usuarioRepository->getAll();
        
        return view('index', compact('users'));
    }

    /**
     * Return the create view
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Return the edit view
     *
     * @param int $id
     */
    public function edit(int $id)
    {
        $user = $this->usuarioRepository->getById($id);

        return view('edit', compact('user'));
    }
}
