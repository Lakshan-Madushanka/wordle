<?php

namespace App\Support\WordGenerators;

use Illuminate\Support\Facades\Http;

class RyanrkWordGenerator implements WordGenerator
{
    private const URL = "https://random-word.ryanrk.com/api";

    public function __construct(private readonly string $language = 'en')
    {
    }

    public function generate(int $length = 6): string
    {
        return Http::timeout(5)->withUrlParameters([
            'endPoint' => self::URL,
            'language' => $this->language,
            'length' => $length,
        ])->get('{+endPoint}/{language}/word/random{?length}')->json()[0];
    }
}
