<?php

namespace MrBadGuy\GameOfGo;

use MrBadGuy\GameOfGo\Status;

class Goban
{
    /**
     * Positions already visited
     *
     * @var array
     */
    private array $visited;

    /**
     * Class constructor
     *
     * @param array $goban 
     */
    public function __construct(
        private readonly array $gobanBoard
    ) {
    }

    /**
     * Get the status of a given position
     * 
     * @param int $x The x-coordinate of the stone.
     * @param int $y The y-coordinate of the stone.
     * 
     * @return Status The status at the given position
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
            default => Status::OUT,
        };
    }

    /**
     * Determines whether a stone at a given position is taken.
     *
     * @param int $x The x-coordinate of the stone.
     * @param int $y The y-coordinate of the stone.
     * 
     * @return bool True if the stone is taken, false otherwise.
     */
    public function isTaken(int $x, int $y): bool
    {
        $status = $this->getStatus($x, $y);

        if ($status !== Status::BLACK && $status !== Status::WHITE) {
            return false;
        }

        return !$this->hasFreedom($x, $y, $status);
    }

    /**
     * Determines whether a stone has freedom.
     * 
     * @param int $x The x-coordinate of the stone.
     * @param int $y The y-coordinate of the stone.
     * @param Status $targetStatus The status at the given position.
     * 
     * @return bool True if the stone has freedom, false otherwise.
     */
    private function hasFreedom(int $x, int $y, Status $targetStatus): bool
    {
        $key = $x . "," . $y;

        if (isset($this->visited[$key])) {
            return false;
        }

        $this->visited[$key] = true;

        $status = $this->getStatus($x, $y);

        if ($status === Status::EMPTY) {
            return true;
        }

        if ($status !== $targetStatus) {
            return false;
        }

        // Check all adjacent positions
        return $this->hasFreedom($x - 1, $y, $targetStatus) ||
            $this->hasFreedom($x + 1, $y, $targetStatus) ||
            $this->hasFreedom($x, $y - 1, $targetStatus) ||
            $this->hasFreedom($x, $y + 1, $targetStatus);
    }
}
