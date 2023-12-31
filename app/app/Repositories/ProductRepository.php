<?php

namespace App\Repositories;

use App\Interfaces\ProductInterface;
use App\Models\Mark;
use App\Models\Product;
use Illuminate\Contracts\Pagination\Paginator;

class ProductRepository implements ProductInterface
{
    /**
     * The function is a constructor that takes a Product and Mark object as parameters.
     */
    public function __construct(private Product $product, private Mark $mark)
    {
    }

    /**
     * The function returns a paginated list of products ordered by their ID in descending order.
     * 
     * @return Paginator The getAll() function is returning a Paginator object.
     */
    public function getAll(): Paginator
    {
        return $this->product->with('mark')->orderBy('id', 'desc')->paginate(10);
    }

    /**
     * The searchProduct function searches for products based on a keyword and returns the results
     * paginated.
     * 
     * @param keyword The keyword parameter is used to search for products that have a name or
     * description containing the specified keyword.
     * @param perPage The  parameter is used to specify the number of products to be displayed
     * per page in the search results.
     * 
     * @return Paginator a Paginator object.
     */
    public function searchProduct($keyword, $perPage): Paginator
    {
        $perPage = isset($perPage) ? intval($perPage) : 10;

        return $this->product->with('mark')->where('name', 'like', '%' . $keyword . '%')
            ->orWhere('description', 'like', '%' . $keyword . '%')
            ->orderBy('id', 'desc')
            ->paginate($perPage);
    }

    /**
     * The create function takes an array of data and returns a new Product object created using that data.
     * 
     * @param array data An array containing the data needed to create a new product. The array should
     * include key-value pairs where the keys represent the attributes of the product (e.g., name, price,
     * description) and the values represent the corresponding values for those attributes.
     * 
     * @return Product The `create` method is returning an instance of the `Product` class.
     */
    public function create(array $data): Product
    {
        return $this->product->create($data);
    }

    /**
     * The function getByID retrieves a product with its associated mark by its ID.
     * 
     * @param int id The "id" parameter is an integer that represents the unique identifier of the product
     * you want to retrieve.
     * 
     * @return ?Product The method is returning a Product object with its associated mark.
     */
    public function getByID(int $id): ?Product
    {
        return $this->product->with('mark')->findOrFail($id);
    }

    /**
     * The function updates a product with the given ID using the provided data and returns the number of
     * affected rows.
     * 
     * @param int id The id parameter is an integer that represents the unique identifier of the product
     * that needs to be updated.
     * @param array data An array containing the data that needs to be updated for the product. The keys of
     * the array should correspond to the column names in the database table for the product, and the
     * values should be the new values for those columns.
     * 
     * @return int The update method is returning an integer value.
     */
    public function update(int $id, array $data): int
    {
        return $this->product->find($id)->update($data);
    }

    /**
     * The delete function deletes a product with the specified ID and returns a boolean indicating whether
     * the deletion was successful.
     * 
     * @param int id The id parameter is an integer that represents the unique identifier of the product
     * that needs to be deleted.
     * 
     * @return bool The delete function is returning a boolean value.
     */
    public function delete(int $id): bool
    {
        return $this->product->destroy($id);
    }

    /**
     * The function fetches all marks from the database and returns them in a paginated format.
     * 
     * @return Paginator a Paginator object.
     */
    public function fetchAllMarks(): Paginator
    {
        return $this->mark->orderBy('name', 'desc')->paginate(10);
    }
}
