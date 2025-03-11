<?php

declare(strict_types=1);

namespace App\Domain\Bus\Query;

use App\Domain\Bus\ResponseInterface;

interface QueryBus
{
    /**
     * @param Query $query
     * @return ResponseInterface|null
     */
    public function ask(Query $query): ?ResponseInterface;

    /**
     * @param string $queryClassName
     * @param string $handlerClassName
     * @return mixed
     */
    public function addHandler(string $queryClassName, string $handlerClassName): void;
}
