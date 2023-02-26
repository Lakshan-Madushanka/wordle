<?php

use App\Support\WordGenerators\WordGenerator;

it('can generate a random word', function () {
    /** @var WordGenerator $wordGenerator */
    $wordGenerator = $this->app->make(WordGenerator::class);

    expect($wordGenerator->generate())->toBeString();
});

it('can generate a random word with a given length', function () {
    $length = 6;
    /** @var WordGenerator $wordGenerator */
    $wordGenerator = $this->app->make(WordGenerator::class);

    expect(strlen($wordGenerator->generate($length)))->toBe($length);
});
