<?php

use MrBadGuy\GameOfGo\Goban;
use MrBadGuy\GameOfGo\Status;

describe("getStatus method", function () {
    it('returns Status::OUT when the goban board array is empty', function () {
        $goban = new Goban([]);

        expect($goban->getStatus(0, 0))->toBe(Status::OUT);
    });

    it('returns Status::OUT when x or y are out of the goban board', function (int $x, int $y) {
        $gobanBoard = [
            ['.', '.', '.'],
            ['.', '.', '.'],
            ['.', '.', '.'],
        ];

        $goban = new Goban($gobanBoard);

        expect($goban->getStatus($x, $y))->toBe(Status::OUT);
    })->with([
        [-1, 1],
        [1, -1],
        [3, 1],
        [1, 3]
    ]);

    it('returns the correct Status based on the position', function (Status $status, int $x, int $y) {
        $gobanBoard = [
            ['.', '.', '.'],
            ['.', 'o', '.'],
            ['.', '.', '#'],
        ];

        $goban = new Goban($gobanBoard);

        expect($goban->getStatus($x, $y))->toBe($status);
    })->with([
        [Status::EMPTY, 0, 0],
        [Status::WHITE, 1, 1],
        [Status::BLACK, 2, 2],
    ]);
});
