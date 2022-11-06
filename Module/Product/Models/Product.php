<?php
declare(strict_types=1);

namespace Module\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Module\Shop\Models\Shop;

class Product extends Model
{
    protected $table = 'products';

    public function shop(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }
}
