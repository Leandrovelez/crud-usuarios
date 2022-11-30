<?php

namespace App\Repositories;

abstract class BaseRepository implements BaseRepositoryContract
{
    /**
     * Store a new user in database
     * @param array $data
     * 
     * @return
     */
    public function store(array $data)
    {
        return $this->model->store($data);
    }

    /**
     * Return user from database and paginate with 10 user per page
     * 
     * @return
     */
    public function getAll()
    {
        return $this->model->paginate(10);
    }
    
    /**
     * User a user from database
     * @param array $data
     * @param int $id
     * 
     * @return
     */
    public function update(array $data, int $id)
    {
        return $this->model->updateById($data, $id);
    }

    /**
     * Delete a user from database
     * @param int $id
     * 
     * @return
     */
    public function delete(int $id)
    {
        return $this->model->delete($id);
    }

    /**
     * Return a single user by Id
     * @param int $id
     * 
     * @param
     */
    public function getById(int $id)
    {
        return $this->model->getById($id);
    }
}
