<?php

declare(strict_types=1);

namespace App\Infrastructure\Bus;

use App\Domain\Bus\Command\Command;
use App\Domain\Bus\Command\CommandBus;
use App\Domain\Bus\ResponseInterface;
use App\Infrastructure\Bus\Locator\BusLocator;

/**
 * Class TacticianCommandBus
 * @package App\Infrastructure\Bus
 */
class TacticianCommandBus extends \League\Tactician\CommandBus implements CommandBus
{
    /**
     * TacticianCommandBus constructor.
     * @param array $middleware
     * @param BusLocator $locator
     */
    public function __construct(array $middleware, private readonly BusLocator $locator)
    {
        parent::__construct($middleware);
    }

    /**
     * @param Command $command
     * @return ResponseInterface|null
     */
    public function dispatch(Command $command): ?ResponseInterface
    {
        return $this->handle($command);
    }

    /**
     * @param string $handlerClassName
     * @param string $commandClassName
     * @return void
     */
    public function addHandler(string $commandClassName, string $handlerClassName): void
    {
        $this->locator->addHandler($handlerClassName, $commandClassName);
    }
}
