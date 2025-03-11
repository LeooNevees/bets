<?php

declare(strict_types=1);

namespace App\Infrastructure\Bus\Locator;

use League\Tactician\Handler\Locator\HandlerLocator;

/**
 * Interface LocatorInterface
 * @package App\Infrastructure\Bus\Middleware
 */
interface BusLocator extends HandlerLocator
{
    /**
     * @param string $handler
     * @param string $commandClassName
     * @return mixed
     */
    public function addHandler(string $handler, string $commandClassName);

    /**
     * @param array $commandClassToHandlerMap
     * @return mixed
     */
    public function addHandlers(array $commandClassToHandlerMap);
}
