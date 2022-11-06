<?php
declare(strict_types=1);

namespace Module\User\UseCase;

use App\Exceptions\BusinessException;
use Exception;
use Illuminate\Support\Carbon;
use Module\User\Models\User;

class VerifyPhoneUseCase
{
    /**
     * @throws Exception
     */
    public function handle(int $phone, int $code)
    {
        $user = User::query()
            ->where('phone', '=', $phone)
            ->where('verify_code', '=', $code)
            ->first();

        if (!$user) {
            throw new BusinessException('user information not found', 404);
        }

        if ($user && (Carbon::parse($user->phone_verified_at) < Carbon::parse(now()))) {
            throw new BusinessException('time out', 404);
        }
        $user->phone_verified_at = Carbon::parse(now());
        $user->save();
        return $user->createToken('auth_token')->plainTextToken;
    }

}
