<?php

namespace Robot\Enums;

class Actions
{
    public const TURN_LEFT = 'TL';
    public const TURN_RIGHT = 'TR';
    public const ADVANCE = 'A';
    public const BACK = 'B';
    public const CLEAN = 'C';

    public static function getAll(): array
    {
        return [
            self::TURN_LEFT,
            self::TURN_RIGHT,
            self::ADVANCE,
            self::BACK,
            self::CLEAN,
        ];
    }
}
