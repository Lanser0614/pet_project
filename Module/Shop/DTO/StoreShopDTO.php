<?php
declare(strict_types=1);

namespace Module\Shop\DTO;

use App\DTO\BaseDTO;

class StoreShopDTO extends BaseDTO
{
    public function __construct(
        private string $name,
        private string $description,
        private string $long,
        private string $lat,
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new static(
            name: $data['name'],
            description: $data['description'],
            long: $data['long'],
            lat: $data['lat'],
        );
    }

    public function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
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
    public function getDescription(): string
    {
        return $this->description;
    }



    /**
     * @return string
     */
    public function getLat(): string
    {
        return $this->lat;
    }

    /**
     * @return string
     */
    public function getLong(): string
    {
        return $this->long;
    }

}
