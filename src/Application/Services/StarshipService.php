<?php

declare(strict_types=1);

namespace App\Application\Services;

use App\Domain\Starship\StarshipRepository;

use Exception;

class StarshipService
{

    /**
     * @var StarshipRepository
     */
    protected $starshipRepository;

    protected $types = array(
        "day" => 24,
        "days" => 24,
        "week" => 168,
        "weeks" => 168,
        "month" => 730.001,
        "months" => 730.001,
        "year" => 8760,
        "years" => 8760
    );


    /**
     * @param StarshipRepository  $starshiprRepository
     */
    public function __construct(StarshipRepository $starshipRepository)
    {
        $this->starshipRepository = $starshipRepository;
    }

    public function calcMGLT($mglt)
    {
        $result = [];
        foreach ($this->starshipRepository->get() as $value) {
            $calc = $this->formuleMGLT($mglt, $value->MGLT, $value->consumables);
            array_push($result, $value->name . ':' . (int)$calc);
        }

        return $result;
    }
    public function formuleMGLT($qtdMglt, $mglt, $consumables)
    {
        return ($qtdMglt / (int) $mglt) / $this->parseHours($consumables);
    }
    public function parseHours($consumables)
    {
        try {
            $stringArray = explode(" ", $consumables);
            $units = (int)($stringArray[0]);
            $type = $stringArray[1];

            if ($this->types[$type]) {
                return $units * $this->types[$type];
            } else {
                return 0;
            }
        } catch (\Exception $e) {
            return 0;
        }
    }
}
