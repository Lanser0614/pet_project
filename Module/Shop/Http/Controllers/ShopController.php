<?php
declare(strict_types=1);

namespace Module\Shop\Http\Controllers;

use App\Exceptions\BusinessException;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Module\Shop\DTO\StoreShopDTO;
use Module\Shop\Http\Requests\StoreShopRequest;
use Module\Shop\Http\Resource\ShopResource;
use Module\Shop\UseCase\GetAllStoreUseCase;
use Module\Shop\UseCase\GetStoreInfoUseCase;
use Module\Shop\UseCase\StoreShopUseCase;

class ShopController extends BaseController
{
    /**
     * @throws BusinessException
     */
    public function index(GetAllStoreUseCase $useCase, Request $request)
    {
        $shops = $useCase->handle(auth()->user(), $request->input('prePage') ?? 20);
        return ShopResource::collection($shops);
    }

    /**
     * @param int $id
     * @param GetStoreInfoUseCase $useCase
     * @return ShopResource
     */
    public function show(int $id, GetStoreInfoUseCase $useCase): ShopResource
    {
        $shopInfo = $useCase->handle($id, auth()->user());
        return new ShopResource($shopInfo);
    }

    /**
     * @param StoreShopRequest $request
     * @param StoreShopUseCase $useCase
     * @return ShopResource
     */
    public function store(StoreShopRequest $request, StoreShopUseCase $useCase): ShopResource
    {
        $shop = $useCase->handle(StoreShopDTO::fromArray($request->validated()), auth()->user());
        return new ShopResource($shop);
    }

    public function update(int $id)
    {

    }

    public function destroy(int $id)
    {

    }

}
