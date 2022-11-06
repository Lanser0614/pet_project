<?php
declare(strict_types=1);

namespace Module\Shop\UseCase;

use Module\Shop\DTO\StoreShopDTO;
use Module\Shop\Models\Shop;
use Module\User\Models\User;

class StoreShopUseCase
{
    /**
     * @param StoreShopDTO $DTO
     * @return Shop
     */
    public function handle(StoreShopDTO $DTO, User $user): Shop
    {
        $shop = new Shop();
        $shop->name = $DTO->getName();
        $shop->user_id = auth()->user()->id;
        $shop->description = $DTO->getDescription();
        $shop->rating = 1;
        $shop->long = $DTO->getLong();
        $shop->lat = $DTO->getLat();
        $shop->save();
        $user->role = User::SELLER_ROLE;
        $user->save();
        $user->shops()->attach($shop->id);
        return $shop;
    }
}
