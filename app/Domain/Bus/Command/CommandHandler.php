<?php

declare(strict_types=1);

namespace App\Domain\Bus\Command;

use App\Domain\Bus\ResponseInterface;

interface CommandHandler
{
    /**
     * @param Command $command
     * @return null|ResponseInterface
     */
    public function handle(Command $command): ?ResponseInterface;
}
