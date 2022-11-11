<?php
declare(strict_types=1);

namespace Module\Product\UseCase;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Module\Product\Models\Product;
use Module\User\Models\User;

class GetShopProductsUseCase
{
    /**
     * @param int $product_id
     * @param int $shop_id
     * @return Product
     */
    public function handle(int $product_id, int $shop_id): Product
    {
        return Product::query()->with(['shop'])
            ->whereHas('shop', static function (Builder $query){
                $query->where('user_id','=', auth()->user()->id);
            })
            ->where('id', '=', $product_id)
            ->where('shop_id', '=', $shop_id)
            ->firstOrFail();

    }
}
