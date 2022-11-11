<?php
declare(strict_types=1);

namespace Module\Product\DTO;

use App\DTO\BaseDTO;

class StoreProductDTO extends BaseDTO
{
    public function __construct(
        private string $name,
        private string $description,
        private int $price,
        private string $cover_img,
        private int $shop_id,
        private array $product_attributes,
        private int $real_price,
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new static(
            name: $data['name'],
            description: $data['description'],
            price: $data['price'],
            cover_img: $data['cover_img'],
            shop_id: $data['shop_id'],
            product_attributes: $data['product_attributes'],
            real_price: $data['real_price'],
        );
    }

    public function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCoverImg(): string
    {
        return $this->cover_img;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return array
     */
    public function getProductAttributes(): array
    {
        return $this->product_attributes;
    }

    /**
     * @return int
     */
    public function getRealPrice(): int
    {
        return $this->real_price;
    }

    /**
     * @return int
     */
    public function getShopId(): int
    {
        return $this->shop_id;
    }
}
