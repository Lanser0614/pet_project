<?php
declare(strict_types=1);

namespace Module\User\UseCase;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Module\User\DTO\SellerCreateDTO;
use Module\User\Models\User;

class StoreSellerUseCase
{
    /**
     * @throws \Exception
     */
    public function handle(SellerCreateDTO $DTO)
    {
        $user = new User();
        $user->name = $DTO->getName();
        $user->email = $DTO->getEmail();
        $user->phone = $DTO->getPhone();
        $user->password = Hash::make($DTO->getPassword());
        $user->verify_code = random_int(1000, 100000);
        $user->phone_verified_at = Carbon::parse(now())->addMinutes(5);
        $user->save();
        return  $user->verify_code;
    }

}
