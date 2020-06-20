<?php

namespace Robot\Enums;

class Directions
{
    public const NORTH = 'N';
    public const EAST = 'E';
    public const SOUTH = 'S';
    public const WEST = 'W';

    public static function getAll(): array
    {
        return [
            self::NORTH,
            self::EAST,
            self::SOUTH,
            self::WEST,
        ];
    }

}