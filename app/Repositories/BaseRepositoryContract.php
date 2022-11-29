<?php

namespace App\Repositories;

interface BaseRepositoryContract
{
    /**
     * @param array $data
     * 
     * @return
     */
    public function store(array $data);

    /**
     * @return
     */
    public function getAll();

    /**
     * @param array $data
     * @param int $id
     * 
     * @return
     */
    public function update(array $data, int $id);

    /**
     * @param int $id
     * 
     * @return
     */
    public function delete(int $id);

    /**
     * @param int $id
     * 
     * @param
     */
    public function getById(int $id);
}
