<?php

declare(strict_types=1);

namespace App\Domain\Bus\Query;

use App\Domain\Bus\ResponseInterface;

interface QueryHandler
{
    /**
     * @param Query $query
     * @return null|ResponseInterface
     */
    public function handle(Query $query): ?ResponseInterface;
}
