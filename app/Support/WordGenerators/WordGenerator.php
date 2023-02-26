<?php

namespace App\Support\WordGenerators;

interface WordGenerator
{
    public function generate(int $length = 6): string;
}
