<?php
declare(strict_types=1);

namespace Module\Shop\Http\Controllers;

use App\Http\Controllers\BaseController;
use Module\Shop\DTO\StoreShopDTO;
use Module\Shop\Http\Requests\StoreShopRequest;
use Module\Shop\Http\Resource\ShopResource;
use Module\Shop\UseCase\StoreShopUseCase;
use Module\User\Models\User;

class ShopController extends BaseController
{
    public function index()
    {

    }

    public function show(int $id)
    {

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
