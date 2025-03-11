<?php

namespace App\Domain\Interface;

use App\Domain\Entity\Document;
use App\Domain\ValueObject\Cnpj;

interface FindBetServiceInterface
{
    public function __invoke(Cnpj $cnpj): ?Document;
}