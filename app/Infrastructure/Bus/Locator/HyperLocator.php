<?php

declare(strict_types=1);

namespace App\Infrastructure\Bus\Locator;

use League\Tactician\Exception\MissingHandlerException;

use function Hyperf\Support\make;

/**
 * Class HyperLocator
 * @package App\Infrastructure\Bus\Locator
 */
class HyperLocator implements BusLocator
{
    /**
     * @var array
     */
    protected array $handlers = [];

    /**
     * @param string $handler
     * @param string $commandClassName
     * @return void
     */
    public function addHandler(string $handler, string $commandClassName): void
    {
        $handlerInstance = make($handler);
        $this->handlers[$commandClassName] = $handlerInstance;
    }

    /**
     * @param array $commandClassToHandlerMap
     * @return void
     */
    public function addHandlers(array $commandClassToHandlerMap): void
    {
        foreach ($commandClassToHandlerMap as $commandClass => $handler) {
            $this->addHandler($handler, $commandClass);
        }
    }

    /**
     * @param string $commandName
     * @return object
     */
    public function getHandlerForCommand($commandName): object
    {
        if (!isset($this->handlers[$commandName])) {
            throw MissingHandlerException::forCommand($commandName);
        }

        return $this->handlers[$commandName];
    }
}
