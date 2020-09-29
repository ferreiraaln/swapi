<?php

declare(strict_types=1);

namespace App\Infrastructure;

use App\Domain\Starship\Starship;
use App\Domain\Starship\StarshipRepository;

class InMemoryStarshipRepository implements StarshipRepository
{
    /**
     * @var Starships[]
     */
    private $starships;

    /**
     * InMemoryStarshipRepository constructor.
     *
     * @param array|null $starships
     */
    public function __construct(array $starships = null)
    {
        $newStarships = new Starship();
        $starships = $newStarships->get();
        $this->starships = $starships->results;
    }

    public function get()
    {
        return $this->starships;
    }
}
