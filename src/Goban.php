<?php

namespace MrBadGuy\GameOfGo;

use MrBadGuy\GameOfGo\Status;

class Goban
{
    /**
     * Class constructor
     *
     * @param array $goban 
     */
    public function __construct(
        private readonly array $gobanBoard,
    ) {
    }

    /**
     * Get the status of a given position
     * 
     * @param integer $x The x coordinate
     * @param integer $y The y coordinate
     * 
     * @return Status
     */
    public function getStatus(int $x, int $y): Status
    {
        if (
            empty($this->gobanBoard) ||
            $x < 0 ||
            $y < 0 ||
            $y >= count($this->gobanBoard) ||
            $x >= count($this->gobanBoard[0])
        ) {
            return Status::OUT;
        }

        return match ($this->gobanBoard[$y][$x]) {
            '.' => Status::EMPTY,
            'o' => Status::WHITE,
            '#' => Status::BLACK,
        };
    }
}
