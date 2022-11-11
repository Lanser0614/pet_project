<?php
declare(strict_types=1);

namespace Module\User\UseCase;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Module\User\Models\User;

class GetAllStoreByUserIdUseCase
{
    /**
     * @param User $user
     * @return Model|Collection|Builder|array|null
     */
    public function handle(User $user): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Builder|array|null
    {
        return User::query()->with('shops')->find($user->id);
    }

}
