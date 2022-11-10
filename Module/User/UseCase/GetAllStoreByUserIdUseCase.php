<?php
declare(strict_types=1);

namespace Module\User\UseCase;

use Module\User\Models\User;

class GetAllStoreByUserIdUseCase
{
    public function handle(User $user)
    {
        return User::query()->with('shops')->find($user->id);
    }

}
