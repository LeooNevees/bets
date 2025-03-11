<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use _PHPStan_2132cc0bd\Nette\Neon\Exception;
use App\Domain\ValueObject\Cnpj;
use App\Domain\ValueObject\CompanyName;

class Document
{
    private function __construct(
        private readonly Cnpj $cnpj,
        private readonly CompanyName $companyName
    ) {
    }

    public static function create(
        Cnpj $cnpj,
        CompanyName $companyName,
    ): self {
        return new self(
            $cnpj,
            $companyName
        );
    }

    public static function createFromArray(array $data): self
    {
        if (empty($data['cnpjRequerente']) || empty($data['razaoSocialRequerente'])) {
            throw new Exception('CNPJ or Company Name is required.');
        }

        return self::create(
            Cnpj::create($data['cnpjRequerente']),
            CompanyName::create($data['razaoSocialRequerente'])
        );
    }

    public function toArray(): array
    {
        return [
            'cnpj' => $this->cnpj->value(),
            'companyName' => $this->companyName->value(),
        ];
    }
}