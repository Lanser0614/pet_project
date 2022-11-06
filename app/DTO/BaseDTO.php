<?php
declare(strict_types=1);

namespace App\DTO;

use JsonSerializable;

abstract class BaseDTO  implements JsonSerializable
{
    /**
     * @param array<mixed> $data
     */
    abstract public static function fromArray(array $data): self;
}
