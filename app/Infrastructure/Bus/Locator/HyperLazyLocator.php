<?php

declare(strict_types=1);

namespace App\Infrastructure\Bus\Locator;

use League\Tactician\Exception\MissingHandlerException;

use function Hyperf\Support\make;

/**
 * Class HyperLazyLocator
 * @package App\Infrastructure\Bus\Locator
 */
class HyperLazyLocator extends HyperLocator
{
    /**
     * @param string $handler
     * @param string $commandClassName
     */
    public function addHandler(string $handler, string $commandClassName): void
    {
        $this->handlers[$commandClassName] = fn() => make($handler);
    }

    /**
     * @param string $commandName
     * @return object
     */
    public function getHandlerForCommand($commandName): object
    {
        if (!is_callable($this->handlers[$commandName])) {
            throw MissingHandlerException::forCommand($commandName);
        }

        $handler = $this->handlers[$commandName];

        return $handler();
    }
}
