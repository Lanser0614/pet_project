<?php
declare(strict_types=1);

namespace Module\User\UseCase;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Module\User\DTO\SellerLoginDTO;
use Module\User\Models\User;
use function PHPUnit\Framework\isEmpty;

class LoginUserUseCase
{
    public function handle(SellerLoginDTO $DTO): array
    {
        $user = User::query()->where('email', $DTO->getEmail())->first();
        if (!$user) {
            return User::UNAUTHORISED_ERROR;
        }
        if (!Hash::check($DTO->getPassword(), $user->password)){
            return User::WRONG_PASSWORD_ERROR;
        }
        if (isEmpty($user->newQuery()->with('shops')->get())){
            return User::HAVA_NOT_STORE_ERROR;
        }
        $success['token'] = $user->createToken('MyAuthApp')->plainTextToken;
        $success['name'] = $user->name;
        return  $success;
    }
}
