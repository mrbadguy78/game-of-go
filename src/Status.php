<?php

namespace MrBadGuy\GameOfGo;

/**
 * Enum representing the Status of a position on a goban board
 */
enum Status: int 
{
    case WHITE = 1;
    case BLACK = 2;
    case EMPTY = 3;
    case OUT = 4;
}
