<?php
declare(strict_types=1);

namespace App\Exceptions;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Throwable;

class UseCaseException extends Exception implements Renderable
{
    public function __construct($message = null, $code = 0, Throwable $previous = null)
    {
        $message = $message ?? 'Ошибка бизнес логики';
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return JsonResponse|string
     */
    public function render(): JsonResponse|string
    {
        return response()->json(['message' => $this->getMessage()], 400);
    }
}
