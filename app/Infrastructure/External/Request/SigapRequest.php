<?php

declare(strict_types=1);

namespace App\Infrastructure\External\Request;

use App\Domain\Enum\SigapEnum;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use function Hyperf\Support\env;

class SigapRequest
{
    public function __construct(
        private readonly Client $client,
    ) {
    }

    public function makeRequest(): ResponseInterface
    {
        return $this->client->get(
            $this->buildUrl(),
            $this->buildHeader()
        );
    }

    private function buildUrl(): string
    {
        return sprintf(
            '%s%s',
            env('SIGAP_HOST'),
            SigapEnum::URI->value
        );
    }

    private function buildHeader(): array
    {
        return [
            RequestOptions::HEADERS => [
                'content-type' => 'application/json',
            ],
        ];
    }

}
