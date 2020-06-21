<?php

namespace Robot\Dto;

class Response
{
    /** @var Coord[] */
    public $visited = [];
    /** @var Coord[] */
    public $cleaned = [];
    /** @var StartPosition[] */
    public $final;
    /** @var int */
    public $battery;
}
