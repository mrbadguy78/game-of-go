<?php

use MrBadGuy\GameOfGo\Status;

$data = [
    [Status::WHITE, 1],
    [Status::BLACK, 2],
    [Status::EMPTY, 3],
    [Status::OUT, 4],
];

it('can create enum values', function ($status) {
    expect($status)->toBeInstanceOf(Status::class);
})->with($data);

it('enum values have correct values', function ($status, $value) {
    expect($status->value)->toBe($value);
})->with($data);
