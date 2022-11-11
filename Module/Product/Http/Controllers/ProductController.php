<?php
declare(strict_types=1);

namespace Module\Product\Http\Controllers;

use App\Http\Controllers\BaseController;
use JsonException;
use Module\Product\DTO\StoreProductDTO;
use Module\Product\Http\Requests\StoreProductRequest;
use Module\Product\Http\Resource\ProductResource;
use Module\Product\UseCase\GetShopProductsUseCase;
use Module\Product\UseCase\StoreProductUseCase;

class ProductController extends BaseController
{
    /**
     * @throws JsonException
     */
    public function store(StoreProductRequest $request, StoreProductUseCase $useCase): ProductResource
    {
        $product = $useCase->handle(StoreProductDTO::fromArray($request->toArray()));
        return new ProductResource($product);
    }

    /**
     * @param int $id
     * @param int $shop_id
     * @param GetShopProductsUseCase $useCase
     * @return ProductResource
     */
    public function show(int $id, int $shop_id, GetShopProductsUseCase $useCase): ProductResource
    {
        $product = $useCase->handle($id, $shop_id);
        return new ProductResource($product);
    }

    /**
     * @param int $id
     * @return void
     */
    public function update(int $id)
    {

    }

    public function destroy(int $id)
    {

    }

}
