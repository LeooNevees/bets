<?php

declare(strict_types=1);

namespace App\Infrastructure\Bus\Factory;

use App\Infrastructure\Bus\Locator\HyperLazyLocator;
use App\Infrastructure\Bus\TacticianQueryBus;
use Hyperf\Contract\ConfigInterface;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use Psr\Container\ContainerInterface;

/**
 * Class TacticianQueryBusFactory
 * @package App\Shared\Infrastructure\Bus\Factory
 */
class TacticianQueryBusFactory
{
    /**
     * @param ContainerInterface $container
     * @return TacticianQueryBus
     */
    public function __invoke(ContainerInterface $container): TacticianQueryBus
    {
        $config = $container->get(ConfigInterface::class);

        $locator = new HyperLazyLocator();
        $locator->addHandlers($config->get('query-bus'));

        $commandHandlerMiddleware = new CommandHandlerMiddleware(
            new ClassNameExtractor(),
            $locator,
            new HandleInflector()
        );

        $middlewares = [
            $commandHandlerMiddleware,
        ];

        return new TacticianQueryBus($middlewares, $locator);
    }
}
