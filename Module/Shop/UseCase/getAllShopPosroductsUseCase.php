<?php
declare(strict_types=1);

namespace Module\Shop\UseCase;


use Module\Shop\Models\Product;

class getAllShopPosroductsUseCase
{
    public function handle(int $shop_id): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Product::query()->where('shop_id', '=', $shop_id)->paginate();
    }
}
