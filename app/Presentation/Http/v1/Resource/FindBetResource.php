<?php

namespace App\Presentation\Http\v1\Resource;

use App\Domain\Bus\ResponseInterface;
use App\Domain\Entity\Document;

class FindBetResource implements ResponseInterface
{
    public function __construct(private readonly Document $document)
    {
    }

    public function jsonSerialize(): array
    {
        return [
            'data' => $this->document->toArray()
        ];
    }

    public function document(): Document
    {
        return $this->document;
    }
}
