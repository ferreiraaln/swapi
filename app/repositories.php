<?php

declare(strict_types=1);

use App\Domain\Starship\StarshipRepository;
use App\Infrastructure\InMemoryStarshipRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        StarshipRepository::class => \DI\autowire(InMemoryStarshipRepository::class)
    ]);
};
