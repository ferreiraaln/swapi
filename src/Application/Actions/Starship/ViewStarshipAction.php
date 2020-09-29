<?php

declare(strict_types=1);

namespace App\Application\Actions\Starship;

use Psr\Http\Message\ResponseInterface as Response;

class ViewStarshipAction extends StarshipAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $mglt = (int) $this->resolveArg('mglt');
        $result = $this->starshipService->calcMGLT($mglt);
        return $this->respondWithData($result);
    }
}
