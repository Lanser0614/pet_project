<?php
declare(strict_types=1);

namespace Module\User\DTO;

use App\DTO\BaseDTO;

class SellerLoginDTO extends BaseDTO
{
    public function __construct(
        private string $email,
        private string $password,
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            email: $data['email'],
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
}
