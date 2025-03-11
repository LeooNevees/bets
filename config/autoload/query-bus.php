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

use App\Application\Find\FindBetHandler;
use App\Application\Find\FindBetQuery;

return [
    FindBetQuery::class => FindBetHandler::class,
];
