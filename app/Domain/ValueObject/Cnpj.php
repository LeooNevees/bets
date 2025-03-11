<?php

namespace App\Domain\ValueObject;

use App\Infrastructure\Exception\InvalidCnpjException;

class Cnpj
{
    public function __construct(
        private string $cnpj
    )
    {
        $this->cnpj = $this->generateValidCNPJ($cnpj);
    }

    public static function create(string $cnpj)
    {
        return new self($cnpj);
    }

    private function generateValidCNPJ(string $cnpj): string
    {
        $cnpj = $this->sanitize($cnpj);

        if (strlen($cnpj) != 14) {
            throw new InvalidCnpjException();
        }

        return $cnpj;
    }

    private function sanitize(string $cnpj): string
    {
        return preg_replace('/[^0-9]/', '', $cnpj);
    }

    public function value(): string
    {
        return $this->cnpj;
    }
}