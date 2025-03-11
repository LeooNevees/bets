<?php

namespace App\Application\Find;

use App\Domain\Bus\Query\Query;
use App\Domain\ValueObject\Cnpj;

class FindBetQuery implements Query
{
    public function __construct(
        private readonly Cnpj $cnpj
    )
    {
    }

    public function cnpj(): Cnpj
    {
        return $this->cnpj;
    }
}