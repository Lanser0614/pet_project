<?php
declare(strict_types=1);

namespace Module\Shop\UseCase;

use App\Exceptions\BusinessException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Module\Shop\Models\Shop;
use Module\User\Models\User;

class GetAllStoreUseCase
{
    /**
     * @throws BusinessException
     */
    public function handle(User $user, int $perPage): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        if ($user->role === User::ADMIN_ROLE){
            return Shop::query()->paginate($perPage);
        }else {
            throw new BusinessException('Not found');
        }

    }
}
