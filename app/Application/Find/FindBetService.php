<?php

namespace App\Application\Find;

use App\Domain\Entity\Document;
use App\Domain\Interface\FindBetServiceInterface;
use App\Domain\Repository\FindBetsSigapRepositoryInterface;
use App\Domain\ValueObject\Cnpj;

class FindBetService implements FindBetServiceInterface
{
    public function __construct(
        private readonly FindBetsSigapRepositoryInterface $repository,
    ) {
    }

    public function __invoke(Cnpj $cnpj): ?Document
    {
        return $this->repository->findByCnpj($cnpj);
    }
}