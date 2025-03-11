<?php

declare(strict_types=1);

/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

use App\Application\Find\FindBetService;
use App\Domain\Bus\Command\CommandBus;
use App\Domain\Bus\Query\QueryBus;
use App\Domain\Interface\FindBetServiceInterface;
use App\Domain\Repository\FindBetsSigapRepositoryInterface;
use App\Infrastructure\Bus\Factory\TacticianCommandBusFactory;
use App\Infrastructure\Bus\Factory\TacticianQueryBusFactory;
use App\Infrastructure\External\Repository\SigapRepository;

return [
    // Service
    FindBetServiceInterface::class => FindBetService::class,

    // Repository
    FindBetsSigapRepositoryInterface::class => SigapRepository::class,

    // Bus
    CommandBus::class => TacticianCommandBusFactory::class,
    QueryBus::class => TacticianQueryBusFactory::class,
];
