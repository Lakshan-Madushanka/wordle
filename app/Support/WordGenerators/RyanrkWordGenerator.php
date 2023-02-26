<?php

namespace App\Support\WordGenerators;

use Illuminate\Support\Facades\Http;

class RyanrkWordGenerator implements WordGenerator
{
    private const URL = "https://random-word.ryanrk.com/api";
    private const ALLOWED_LETTERS = [
        'a',
        'b',
        'c',
        'd',
        'e',
        'f',
        'g',
        'h',
        'i',
        'j',
        'k',
        'l',
        'm',
        'n',
        'o',
        'p',
        'q',
        'r',
        's',
        't',
        'u',
        'v',
        'w',
        'x',
        'y',
        'z',
    ];

    public function __construct(private readonly string $language = 'en')
    {
    }

    public function generate(int $length = 5): string
    {
        $word = Http::timeout(5)->withUrlParameters([
            'endPoint' => self::URL,
            'language' => $this->language,
            'length' => $length,
        ])->get('{+endPoint}/{language}/word/random{?length}')->json()[0];

        $word = strtolower($word);

        while (! $this->validateWord($word)) {
            $this->generate(6);
        }

        return $word;
    }

    public function validateWord(string $word): bool
    {
        $length = strlen($word);

        for ($i = 0; $i < $length; $i++) {
            if (! in_array($word[$i], self::ALLOWED_LETTERS)) {
                return false;
            }
        }

        return true;
    }
}
