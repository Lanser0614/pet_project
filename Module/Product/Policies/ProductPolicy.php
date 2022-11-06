<?php
declare(strict_types=1);

namespace Module\Product\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Module\Product\Models\Product;
use Module\User\Models\User;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the Product.
     *
     * @param User $user
     * @param Product $Product
     * @return bool
     */
    public function view(User $user, Product $Product): bool
    {
//        return $user->shops();
    }

    /**
     * Determine whether the user can create Products.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user)
    {
        return $user->id > 0;
    }

    /**
     * Determine whether the user can update the Product.
     *
     * @param User $user
     * @param Product $Product
     * @return bool
     */
    public function update(User $user, Product $Product)
    {
        return $user->id == $Product->user_id;
    }

    /**
     * Determine whether the user can delete the Product.
     *
     * @param User $user
     * @param Product $Product
     * @return bool
     */
    public function delete(User $user, Product $Product)
    {
        return $user->id == $Product->user_id;
    }
}
