<?php

declare(strict_types=1);

namespace HyperfTest\Integration\v1;

use Hyperf\Testing\TestCase;

/**
 * @internal
 * @coversNothing
 */
class BetControllerTest extends TestCase
{
    const ENDPOINT = 'api/v1/bet/%s';

    public function testFindSuccess(): void
    {
        $response = $this->get(sprintf(self::ENDPOINT, '34935286000119'));
        $content = json_decode($response->getContent(), true, 512, JSON_THROW_ON_ERROR);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals("34935286000119", $content['data']['cnpj']);
        $this->assertEquals("MMD TECNOLOGIA, ENTRETENIMENTO E MARKETING LTDA.", $content['data']['companyName']);
    }

    public function testFindNotFound(): void
    {
        $response = $this->get(sprintf(self::ENDPOINT, '12345678901234'));
        $content = json_decode($response->getContent(), true, 512, JSON_THROW_ON_ERROR);

        $this->assertEquals(404, $response->getStatusCode());
        $this->assertEquals(404, $content['code']);
        $this->assertEquals("Document not found", $content['message']);
    }

    public function testFindInvalidCnpj(): void
    {
        $response = $this->get(sprintf(self::ENDPOINT, '1234567890123'));
        $content = json_decode($response->getContent(), true, 512, JSON_THROW_ON_ERROR);

        $otherResponse = $this->get(sprintf(self::ENDPOINT, '1234567890123'));
        $otherContent = json_decode($otherResponse->getContent(), true, 512, JSON_THROW_ON_ERROR);

        $this->assertEquals(422, $response->getStatusCode());
        $this->assertEquals(422, $content['code']);
        $this->assertEquals("CNPJ deve ter 14 dígitos", $content['message']);

        $this->assertEquals(422, $otherResponse->getStatusCode());
        $this->assertEquals(422, $otherContent['code']);
        $this->assertEquals("CNPJ deve ter 14 dígitos", $otherContent['message']);
    }
}
