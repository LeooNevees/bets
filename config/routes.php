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

use App\Presentation\Http\v1\Controller\BetController;
use Hyperf\HttpServer\Router\Router;

Router::addGroup('/api/v1', function () {
    Router::addGroup('/bet', function () {
        Router::get('/{cnpj}', [BetController::class, 'find']);
    });
});

