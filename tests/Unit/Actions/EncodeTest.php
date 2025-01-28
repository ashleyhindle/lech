<?php

use App\Actions\Encode;
use App\Exceptions\GenerationFailedException;
use App\Exceptions\InvalidUrlException;

test('throws exception if url is not valid', function () {
    (new Encode)('cheese');
})->throws(InvalidUrlException::class);

test('throws exception if we cannot insert into the database', function () {
    // This fails to insert into the database because no database is available. If we 'fix' the database later, this test will fail and we can update it.
    (new Encode)('https://www.google.com');
})->throws(GenerationFailedException::class);
