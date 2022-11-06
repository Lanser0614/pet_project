<?php
declare(strict_types=1);

namespace Module\User\DTO;

use App\DTO\BaseDTO;

final class SellerCreateDTO extends BaseDTO
{
    public function __construct(
        private string $name,
        private string $email,
        private int $phone,
        private string $password,
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            email: $data['email'],
            phone: $data['phone'],
            password: $data['password'],
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
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return int
     */
    public function getPhone(): int
    {
        return $this->phone;
    }
}
