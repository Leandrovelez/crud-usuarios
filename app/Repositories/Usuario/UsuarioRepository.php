<?php

namespace App\Repositories\Usuario;

use App\Models\Usuario;
use App\Repositories\BaseRepository;

class UsuarioRepository extends BaseRepository implements UsuarioRepositoryContract
{
    /**
     * @var Usuario
     */
    protected $model;

    /**
     * @param Usuario $model
     */
    public function __construct(Usuario $model)
    {
        $this->model = $model;
    }
}
