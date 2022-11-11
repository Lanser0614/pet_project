<?php
declare(strict_types=1);

namespace Module\Product\UseCase;

use Module\Product\DTO\StoreProductDTO;
use Module\Product\Models\Product;

class StoreProductUseCase
{
    /**
     */
    public function handle(StoreProductDTO $DTO): Product
    {
        $product = new Product();
        $product->name = $DTO->getName();
        $product->price = $DTO->getPrice();
        $product->product_attributes = $DTO->getProductAttributes();
        $product->real_price = $DTO->getRealPrice();
        $product->cover_img = $DTO->getCoverImg();
        $product->description = $DTO->getDescription();
        $product->shop_id = $DTO->getShopId();
        $product->save();
        return $product;
    }
}
