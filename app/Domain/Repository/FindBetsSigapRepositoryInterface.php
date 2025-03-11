<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Entity\Document;
use App\Domain\ValueObject\Cnpj;

interface FindBetsSigapRepositoryInterface
{
    public function findByCnpj(Cnpj $cnpj): ?Document;
}