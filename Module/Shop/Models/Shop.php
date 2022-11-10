<?php
declare(strict_types=1);

namespace Module\Shop\Models;

use Illuminate\Database\Eloquent\Model;
use Module\User\Models\User;

class Shop extends Model
{

    protected $table = 'shops';
    protected $fillable = ['name', 'is_active', 'description', 'rating'];

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this
            ->belongsToMany(Shop::class,
                'user_shops', 'shop_id', 'user_id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
