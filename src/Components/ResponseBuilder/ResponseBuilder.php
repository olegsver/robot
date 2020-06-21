<?php

namespace Robot\Components\ResponseBuilder;

use Robot\Dto\Coord;
use Robot\Dto\Response;
use Robot\Dto\StartPosition;

class ResponseBuilder
{
    /**
     * @var Response
     */
    private $response;

    public function __construct()
    {
        $this->response = new Response();
    }

    public function setVisited(int $x, int $y): void
    {
        $this->response->visited[] = $this->makeCoord($x, $y);
    }

    public function setCleaned(int $x, int $y): void
    {
        $this->response->cleaned[] = $this->makeCoord($x, $y);
    }

    public function setBatteryLeft(int $batteryLet): void
    {
        $this->response->battery = $batteryLet;
    }

    public function setPosition(StartPosition $position): void
    {
        $this->response->final = $position;
    }

    public function getResponse(): Response
    {
        return $this->response;
    }

    private function makeCoord(int $x, int $y): Coord
    {
        $coord = new Coord();
        $coord->X = $x;
        $coord->Y = $y;
        return $coord;
    }
}
