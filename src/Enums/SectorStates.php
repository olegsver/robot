<?php

namespace Robot\Enums;

class SectorStates
{
    public const STATE_CLEANABLE = 'S';
    public const STATE_COLUMN = 'C';
    public const STATE_WALL = 'null';

    public static function getAll(): array
    {
        return [
            self::STATE_CLEANABLE,
            self::STATE_COLUMN,
            self::STATE_WALL,
        ];
    }
}
