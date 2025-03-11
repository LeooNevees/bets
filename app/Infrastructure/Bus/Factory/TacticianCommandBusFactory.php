<?php

declare(strict_types=1);

namespace App\Infrastructure\Bus\Factory;

use App\Infrastructure\Bus\Locator\HyperLazyLocator;
use App\Infrastructure\Bus\TacticianCommandBus;
use Hyperf\Contract\ConfigInterface;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use Psr\Container\ContainerInterface;

/**
 * Class TacticianCommandBusFactory
 * @package App\Shared\Infrastructure\Bus\Factory
 */
class TacticianCommandBusFactory
{
    /**
     * @param ContainerInterface $container
     * @return TacticianCommandBus
     */
    public function __invoke(ContainerInterface $container): TacticianCommandBus
    {
        $config = $container->get(ConfigInterface::class);

        $locator = new HyperLazyLocator();
        $locator->addHandlers($config->get('command-bus'));

        $commandHandlerMiddleware = new CommandHandlerMiddleware(
            new ClassNameExtractor(),
            $locator,
            new HandleInflector()
        );

        $middlewares = [
            $commandHandlerMiddleware,
        ];

        return new TacticianCommandBus($middlewares, $locator);
    }
}
