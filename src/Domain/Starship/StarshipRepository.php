<?php

declare(strict_types=1);

namespace App\Domain\Starship;

interface StarshipRepository
{
    /**
     * @return Starship[]
     */
    public function get();
}
