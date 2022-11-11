<?php
declare(strict_types=1);

namespace Module\Product\UseCase;

use Illuminate\Database\Eloquent\Builder;
use Module\Product\Models\Product;

class UpdateProductUseCase
{
    public function handle(in)
    {
        Product::query()->with(['shop'])
            ->whereHas('shop', static function (Builder $query){
                $query->where('user_id','=', auth()->user()->id);
            })
            ->where('id', '=', $product_id)
            ->firstOrFail()
    }
}
