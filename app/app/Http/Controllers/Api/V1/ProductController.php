<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\ProductRequest;
use App\Http\Resources\Api\V1\ProductResource;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * The constructor function initializes a private property  with an instance of the
     * ProductRepository class.
     */
    public function __construct(private ProductRepository $productRepository)
    {
    }

    /**
     * The index function retrieves products based on a search query and returns them as a collection of
     * ProductResource.
     * 
     * @param Request request The `` parameter is an instance of the `Illuminate\Http\Request`
     * class. It represents an incoming HTTP request and contains information such as the request method,
     * headers, query parameters, and request body.
     * 
     * @return AnonymousResourceCollection an instance of the `AnonymousResourceCollection` class.
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $search = $request->query('search');
        $products = $search
            ? $this->productRepository->searchProduct($search, $request->perPage)
            : $this->productRepository->getAll();

        return ProductResource::collection($products);
    }

    /**
     * The store function creates a new product using the validated data from the request and returns a
     * resource representation of the created product.
     * 
     * @param ProductRequest request The `` parameter is an instance of the `ProductRequest` class.
     * It is used to validate and retrieve the data sent in the request. In this case, it is used to
     * validate the data and retrieve the validated data using the `validated()` method.
     * 
     * @return ProductResource The store() function is returning an instance of the ProductResource class.
     */
    public function store(ProductRequest $request): ProductResource
    {
        $product = $this->productRepository->create($request->validated());
        return ProductResource::make($product);
    }

    /**
     * The function "show" retrieves a product by its ID and returns it as a ProductResource object.
     * 
     * @param string id The "id" parameter is a string that represents the unique identifier of a product.
     * It is used to retrieve the product from the product repository.
     * 
     * @return ProductResource an instance of the `ProductResource` class.
     */
    public function show(string $id): ProductResource
    {
        $product = $this->productRepository->getByID($id);
        return ProductResource::make($product);
    }

    /**
     * The function updates a product with the given ID using the validated data from the request and
     * returns a resource representation of the updated product.
     * 
     * @param ProductRequest request The `` parameter is an instance of the `ProductRequest` class.
     * It is used to validate and retrieve the data sent in the request.
     * @param string id The `id` parameter is a string that represents the unique identifier of the product
     * that needs to be updated.
     * 
     * @return ProductResource The method is returning an instance of the `ProductResource` class.
     */

    public function update(ProductRequest $request, string $id): ProductResource
    {
        $product = $this->productRepository->getByID($id);
        $this->productRepository->update($product->id, $request->validated());

        return ProductResource::make($product);
    }

    /**
     * The "destroy" function deletes a product from the database based on its ID.
     * 
     * @param string id The `id` parameter is a string that represents the unique identifier of the product
     * that needs to be deleted.
     * 
     * @return Response a `Response` object.
     */
    public function destroy(string $id): Response
    {
        $product = $this->productRepository->getByID($id);
        $this->productRepository->delete($product->id);

        return response()->noContent();
    }

    /**
     * The function "mark" retrieves all marks from the product repository and returns them as a collection
     * of anonymous resources.
     * 
     * @return AnonymousResourceCollection an AnonymousResourceCollection of ProductResource objects.
     */
    public function mark(): AnonymousResourceCollection
    {
        $marks = $this->productRepository->fetchAllMarks();
        return ProductResource::collection($marks);
    }
}
