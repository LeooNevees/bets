<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace App\Infrastructure\Exception;

use InvalidArgumentException;
use Throwable;

class InvalidCnpjException extends InvalidArgumentException
{
    private const MESSAGE = 'CNPJ deve ter 14 dígitos';
    private const CODE = 422;

    public function __construct(Throwable $previous = null)
    {
        parent::__construct(self::MESSAGE, self::CODE, $previous);
    }
}
