<?php
declare(strict_types=1);

namespace Module\User\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\JsonResponse;
use Module\User\DTO\SellerCreateDTO;
use Module\User\DTO\SellerLoginDTO;
use Module\User\Http\Requests\LoginRequest;
use Module\User\Http\Requests\RegisterRequest;
use Module\User\Http\Requests\VerifyPhoneRequest;
use Module\User\UseCase\LoginUserUseCase;
use Module\User\UseCase\StoreSellerUseCase;
use Module\User\UseCase\VerifyPhoneUseCase;

class UserController extends BaseController
{
    /**
     * @param RegisterRequest $request
     * @param StoreSellerUseCase $useCase
     * @return JsonResponse
     */
    public function register(RegisterRequest $request, StoreSellerUseCase $useCase): \Illuminate\Http\JsonResponse
    {

        $verify_code = $useCase->handle(DTO: SellerCreateDTO::fromArray($request->validated()));

        return $this->sendMessage([
            'verify_code' => $verify_code
        ]);
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request, LoginUserUseCase $useCase): JsonResponse
    {
        $success = $useCase->handle(DTO: SellerLoginDTO::fromArray($request->validated()));
        return $this->sendMessage($success);
    }

    public function verify(VerifyPhoneRequest $request, VerifyPhoneUseCase $useCase): JsonResponse
    {
        $token = $useCase->handle($request->input('phone'), $request->input('code'));
        return $this->sendMessage([
            'token' => $token
        ]);
    }


}