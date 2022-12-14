<?php
declare(strict_types=1);

namespace Module\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Module\Shop\Models\Shop;

/**
 * Class Product.
 *
 * @property int $name
 * @property string $description
 * @property float $price
 * @property string $cover_img
 * @property int $shop_id
 * @property array $product_attributes
 * @property int $real_price
 */
class Product extends Model
{
    protected $table = 'products';

    protected $casts = [
        'product_attributes' => 'array'
    ];
    /**
     * @return BelongsTo
     */
    public function shop(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }
}
