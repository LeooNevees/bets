<?php

namespace App\Application\Find;

use App\Domain\Bus\Query\Query;
use App\Domain\Bus\Query\QueryHandler;
use App\Domain\Bus\ResponseInterface;
use App\Presentation\Http\v1\Resource\FindBetResource;

class FindBetHandler implements QueryHandler
{
    public function __construct(private readonly FindBetService $service)
    {
    }

    public function handle(Query $query): ?ResponseInterface
    {
        $document = ($this->service)($query->cnpj());

        return new FindBetResource($document);
    }

}