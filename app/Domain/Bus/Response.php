<?php

declare(strict_types=1);

namespace App\Domain\Bus;

abstract class Response implements ResponseInterface
{
    /**
     * @return array
     */
    abstract public function toArray(): array;

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
