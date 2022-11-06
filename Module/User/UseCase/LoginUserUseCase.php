<?php
declare(strict_types=1);

namespace Module\User\UseCase;

use Illuminate\Support\Facades\Auth;
use Module\User\DTO\SellerLoginDTO;

class LoginUserUseCase
{
    public function handle(SellerLoginDTO $DTO): array
    {
        $user = Auth::attempt(['email' => $DTO->getEmail(), 'password' => $DTO->getPassword()]);
        if (!$user) {
            return ['error' => 'Unauthorised'];
        }
        $authUser = Auth::user();
        $success['token'] = $authUser->createToken('MyAuthApp')->plainTextToken;
        $success['name'] = $authUser->name;
        return  $success;
    }
}
