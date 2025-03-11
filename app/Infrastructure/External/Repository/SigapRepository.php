<?php

declare(strict_types=1);

namespace App\Infrastructure\External\Repository;

use App\Domain\Entity\Document;
use App\Domain\Repository\FindBetsSigapRepositoryInterface;
use App\Domain\ValueObject\Cnpj;
use App\Infrastructure\External\Request\SigapRequest;
use Exception;

class SigapRepository implements FindBetsSigapRepositoryInterface
{
    public function __construct(
        private readonly SigapRequest $request
    ) {
    }

    public function findByCnpj(Cnpj $cnpj): ?Document
    {
        $response = $this->request->makeRequest();

        if ($response->getStatusCode() !== 200) {
            throw new Exception("Invalid Response of the SIGAP");
        }

        $decodedData = json_decode($response->getBody()->getContents(), true);
        if (!isset($decodedData['data'])) {
            throw new Exception("Invalid Response of the SIGAP");
        }

        return $this->getDocumentFromResponse($decodedData['data'], $cnpj);
    }

    private function getDocumentFromResponse(array $data, Cnpj $cnpj): ?Document
    {
        $map = array_column($data, null, 'cnpjRequerente');

        return isset($map[$cnpj->value()])
            ? Document::createFromArray($map[$cnpj->value()])
            : null;
    }
}
