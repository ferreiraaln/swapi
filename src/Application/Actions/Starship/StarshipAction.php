<?php

declare(strict_types=1);

namespace App\Application\Actions\Starship;

use App\Application\Actions\Action;
use App\Application\Services\StarshipService;
use Psr\Log\LoggerInterface;

abstract class StarshipAction extends Action
{
    /**
     * @var StarshipService
     */
    protected $starshipService;

    /**
     * @param LoggerInterface $logger
     * @param StarshipRepository  $starshiprRepository
     */
    public function __construct(
        LoggerInterface $logger,
        StarshipService $starshipService
    ) {
        parent::__construct($logger);
        $this->starshipService = $starshipService;
    }
}
