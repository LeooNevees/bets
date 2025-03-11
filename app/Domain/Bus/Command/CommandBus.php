<?php

declare(strict_types=1);

namespace App\Domain\Bus\Command;

use App\Domain\Bus\ResponseInterface;

interface CommandBus
{
    /**
     * @param Command $command
     */
    public function dispatch(Command $command): ?ResponseInterface;

    /**
     * @param string $commandClassName
     * @param string $handlerClassName
     * @return mixed
     */
    public function addHandler(string $commandClassName, string $handlerClassName): void;
}
