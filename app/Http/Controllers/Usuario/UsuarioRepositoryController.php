<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Http\Requests\Usuario\CreateUsuarioRequest;
use App\Http\Requests\Usuario\UpdateUsuarioRequest;
use App\Repositories\Usuario\UsuarioRepositoryContract;
use Illuminate\Http\JsonResponse;

class UsuarioRepositoryController extends Controller
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
     * 
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $users = $this->usuarioRepository->getAll();

        $response = [
            'success'=> true,
            'usuers' => $users
        ];

        return response()->json($response);
    }

    /**
     * Store the user and return a json with the result and messsage
     * @param CreateUsuarioRequest $request
     *
     * @return JsonResponse
     */
    public function store(CreateUsuarioRequest $request): JsonResponse
    {        
        $save = $this->usuarioRepository->store($request->validated());

        $response = [];

        if ($save) {
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
     * @param int $id  
     * @param UpdateUsuarioRequest $request
     * 
     * @return JsonResponse
     */
    public function update(UpdateUsuarioRequest $request, int $id): JsonResponse
    {        
        $save = $this->usuarioRepository->update($request->validated(), $id);

        $response = [];

        if ($save) {
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
     * @param int $id
     * 
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $user = $this->usuarioRepository->delete($id);

        $response = [];
        if ($user) {
            $response['success'] = true;
            $response['message'] = "Usuário deletado com sucesso";
        } else {
            $response['success'] = true;
            $response['message'] = "Erro ao deletar o usuário";
        }

        return response()->json($response);
    }
}
