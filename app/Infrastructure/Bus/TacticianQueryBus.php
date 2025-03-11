<?php

declare(strict_types=1);

namespace App\Infrastructure\Bus;

use App\Infrastructure\Bus\Locator\BusLocator;
use League\Tactician\CommandBus;
use App\Domain\Bus\Query\Query;
use App\Domain\Bus\Query\QueryBus;
use App\Domain\Bus\ResponseInterface;

/**
 * Class TacticianQueryBus
 * @package App\Infrastructure\Bus
 */
final class TacticianQueryBus extends CommandBus implements QueryBus
{
    /**
     * TacticianQueryBus constructor.
     * @param array $middleware
     * @param BusLocator $locator
     */
    public function __construct(array $middleware, private readonly BusLocator $locator)
    {
        parent::__construct($middleware);
    }

    /**
     * @param Query $query
     * @return ResponseInterface|null
     */
    public function ask(Query $query): ?ResponseInterface
    {
        return $this->handle($query);
    }

    /**
     * @param string $queryClassName
     * @param string $handlerClassName
     * @return void
     */
    public function addHandler(string $queryClassName, string $handlerClassName): void
    {
        $this->locator->addHandler($handlerClassName, $queryClassName);
    }
}
