<?php

namespace App\Enums;

Enum GameStatus: string
{
    case ACTIVE = 'active';
    case WON = 'won';
    case LOST = 'lost';
}
