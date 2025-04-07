<?php

declare(strict_types=1);

namespace HyperfTest\Unit\Application\Find;

use App\Application\Find\FindBetQuery;
use App\Domain\ValueObject\Cnpj;
use Hyperf\Testing\TestCase;

class FindBetQueryTest extends TestCase
{
    public function testMake(): void
    {
        $cnpj = Cnpj::create('36452174000132');

        $query = new FindBetQuery($cnpj);

        $this->assertEquals($cnpj, $query->cnpj());
    }
}
