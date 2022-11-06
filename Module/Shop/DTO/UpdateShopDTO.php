<?php
declare(strict_types=1);

namespace Module\Shop\DTO;

use App\DTO\BaseDTO;

class UpdateShopDTO extends BaseDTO
{

    public function __construct(
        private string $name,
        private bool   $is_active,
        private string $description,
        private int    $rating,
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new static(
            name: $data['name'],
            is_active: $data['is_active'],
            description: $data['description'],
            rating: $data['rating'],
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
     * @return int
     */
    public function getRating(): int
    {
        return $this->rating;
    }

    /**
     * @return bool
     */
    public function isIsActive(): bool
    {
        return $this->is_active;
    }
}
