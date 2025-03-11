<?php

namespace App\Domain\ValueObject;

class CompanyName
{
    public function __construct(
        private string $companyName
    )
    {
        $this->companyName = trim($companyName);
    }

    public static function create(string $cnpj)
    {
        return new self($cnpj);
    }

    public function value(): string
    {
        return $this->companyName;
    }
}