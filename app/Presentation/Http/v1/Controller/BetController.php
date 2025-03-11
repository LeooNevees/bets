<?php

declare(strict_types=1);

namespace App\Presentation\Http\v1\Controller;

use App\Application\Find\FindBetQuery;
use App\Domain\ValueObject\Cnpj;

class BetController extends AbstractController
{
    public function find(string $cnpj)
    {
        $query = new FindBetQuery(Cnpj::create($cnpj));
        $return = $this->queryBus->ask($query);

        return $return->jsonSerialize();
    }
}
