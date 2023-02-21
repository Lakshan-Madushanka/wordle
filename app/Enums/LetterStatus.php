<?php

namespace App\Enums;

enum LetterStatus: string
{
    case CORRECT  = 'correct';
    case PRESENT  = 'present';
    case ABSENCE  = 'absence';
}
