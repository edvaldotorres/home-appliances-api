<?php

namespace App\Interfaces;

interface ProductInterface
{
    /**
     * Get All Data
     *
     * @return array All Data
     */
    public function getAll();

    /**
     * Create New Item
     *
     * @param array $data
     * @return object Created Product
     */
    public function create(array $data);

    /**
     * Get Item Details By ID
     *
     * @param int $id
     * @return object Get Product
     */
    public function getByID(int $id);

    /**
     * Update Product By Id and Data
     *
     * @param int $id
     * @param array $data
     * @return object Updated Product Information
     */
    public function update(int $id, array $data);

    /**
     * Delete Item By Id
     *
     * @param int $id
     * @return object Deleted Product
     */
    public function delete(int $id);
}
