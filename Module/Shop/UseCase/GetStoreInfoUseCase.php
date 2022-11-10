<?php
declare(strict_types=1);

namespace Module\Shop\UseCase;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Module\Shop\Models\Shop;
use Module\User\Models\User;

class GetStoreInfoUseCase
{
    /**
     * @param int $id
     * @param User $user
     * @return Builder|Model|object
     */
    public function handle(int $id, User $user): Shop
    {
        return Shop::query()
            ->with('user')
            ->where('id', '=', $id)
            ->where('user_id', '=', $user->id)
            ->first();
    }
}
