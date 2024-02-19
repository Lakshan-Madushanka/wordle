<?php

use App\Support\WordGenerators\RyanrkWordGenerator;

it('can validate a word', function () {
    $wordGenerator = new RyanrkWordGenerator();

    expect($wordGenerator->validateWord('laksh-6'))->toBeFalse()
        ->and($wordGenerator->validateWord('laksh'))->toBeTrue();
});
