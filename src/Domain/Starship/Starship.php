<?php

declare(strict_types=1);

namespace App\Domain\Starship;

class Starship
{
    /**
     * @var int|null
     */
    protected $route = ROUTEAPI . "starships/";

    public function get()
    {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->route);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TCP_KEEPALIVE, 1);
            curl_setopt($ch, CURLOPT_TCP_KEEPIDLE, 2);
            $data = curl_exec($ch);
            if (curl_errno($ch)) {
                throw new \Exception(curl_error($ch));
            }
            curl_close($ch);
            return json_decode($data);
        } catch (\Exception $e) {
            // do something on exception
        }
    }
}
