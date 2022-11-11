<?php
declare(strict_types=1);

namespace Module\Product\UseCase;

use Module\User\Models\User;

class GetAllShopProductsUseCase
{
    public function handle(User $user)
    {
        dd(auth()->user()->id);
    }
}
