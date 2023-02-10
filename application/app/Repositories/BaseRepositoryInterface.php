<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function getAll();

    /**
     * Paginate
     * @param array $queries
     * @return mixed
     */
    public function paginate(array $queries = []);

    /**
     * Get one
     * @param int $id
     * @return mixed
     */
    public function find(int $id);

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes = []);

    /**
     * Update
     * @param int $id
     * @param array $attributes
     * @return mixed
     */
    public function update(int $id, array $attributes = []);

    /**
     * Update or create
     * @param array $unique_columns
     * @param array $data_columns
     * @param array $data
     * @return mixed
     */
    public function updateOrCreate(array $unique_columns,array $data_columns,array $data);

    /**
     * Delete
     * @param int $id
     * @return mixed
     */
    public function delete(int $id): bool;
}
