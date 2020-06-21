<?php

namespace Robot\Components\ResponseBuilder;

use Robot\Dto\Coord;
use Robot\Dto\Response;
use Robot\Dto\StartPosition;
use Robot\Interfaces\LoggerInterface;

class ResponseBuilder
{
    /**
     * @var Response
     */
    private $response;
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->response = new Response();
        $this->logger = $logger;
    }

    public function setVisited(int $x, int $y): void
    {
        $this->logger->log("Visiting {$x},{$y}", null);
        array_unshift($this->response->visited, $this->makeCoord($x, $y));
    }

    public function setCleaned(int $x, int $y): void
    {
        $this->logger->log("Cleanging {$x},{$y}", null);
        array_unshift($this->response->cleaned, $this->makeCoord($x, $y));
    }

    public function setBatteryLeft(int $batteryLet): void
    {
        $this->logger->log("Battery left: {$batteryLet}", null);
        $this->response->battery = $batteryLet;
    }

    public function setPosition(StartPosition $position): void
    {
        $this->logger->log("Direction {$position->facing}", null);
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
