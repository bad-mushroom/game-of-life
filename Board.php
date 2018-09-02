<?php

class Board
{
    protected $width;
    protected $height;
    protected $cells = [];

    /**
     * Board
     *
     * @param integer $height Number of cells on Y axis
     * @param integer $width  Number of cells on X axis
     */
    public function __construct(int $height = 25, int $width = 25)
    {
        $this->height = $height;
        $this->width = $width;

        $this->generate();
    }

    /**
     * Generate board array.
     *
     * Each array index will be populated with a Cell object.
     *
     * @return array
     */
    public function generate() : array
    {
        $this->clear();

        for ($x = 0; $x < $this->height; $x++) {
            for ($y = 0; $y < $this->width; $y++) {
                $cell = new Cell($x, $y);
                $this->cells[$x][$y] = $cell;
            }
        }

        return $this->cells;
    }

    /**
     * Run the game loop.
     *
     * @return void
     */
    public function run()
    {
        while (true) {
            $board->render();
            $board->update();
        }
    }

    /**
     * Height Getter
     */
    public function getHeight() : int
    {
        return $this->height;
    }

    /**
     * Width Getter
     */
    public function getWidth() : int
    {
        return $this->width;
    }

    /**
     * Render the board along with the state of each Cell.
     *
     * @param  integer $delay   NUmber of seconds before rendering each frame
     * @return void
     */
    public function render(int $delay = 1)
    {
        sleep($delay);
        $this->clear();

        for ($x = 0; $x < $this->width; $x++) {
            for ($y = 0; $y < $this->height; $y++) {

                if ($this->cells[$x][$y]->getState() === Cell::STATE_ALIVE) {
                    echo Cell::DISPLAY_ALIVE;
                } else{
                    echo Cell::DISPLAY_DEAD;
                }
            }

            echo "\n";
        }
    }

    /**
     * Game Loop
     *
     * Updates the game board with each Cell's state.
     *
     * Rules:
     * - Any live cell with fewer than two live neighbours dies, as if caused by underpopulation.
     * - Any live cell with two or three live neighbours lives on to the next generation.
     * - Any live cell with more than three live neighbours dies, as if by overpopulation.
     * - Any dead cell with exactly three live neighbours becomes a live cell, as if by reproduction.
     *
     * @return void
     */
    public function update()
    {
        for ($x = 0; $x < $this->width; $x++) {
            for ($y = 0; $y < $this->height; $y++) {

                $cell = $this->cells[$x][$y];

                switch ($this->countNeighbors($cell)) {

                    // Dies: Underpopulation
                    case 0:
                    case 1:
                        $cell->setState(Cell::STATE_DEAD);
                        break;

                    // Lives: Stabilization
                    case 2:
                        // No change in state
                        break;

                    // Lives: Reproduction
                    case 3:
                        $cell->setState(Cell::STATE_ALIVE);
                        break;

                    // Dies: Overpopulation
                    default:
                        $cell->setState(Cell::STATE_DEAD);
                }
            }
        }
    }

    /**
     * Count a Cell's neighbors by checking surrounding indexes for their Cell's state.
     *
     * @param  Cell     $cell       The cell object to check
     * @return integer  $neighbors  Total number of neighbors found
     */
    protected function countNeighbors(Cell $cell) : int
    {
        $neighbors = 0;

        for ($xNeighbor = $cell->getPositionX() - 1; $xNeighbor <= $cell->getPositionX() + 1; $xNeighbor++) {
            for ($yNeighbor = $cell->getPositionY() -1; $yNeighbor <= $cell->getPositionY() + 1; $yNeighbor++) {

                // Check for out-of-bounds
                if (($yNeighbor < 0 || $yNeighbor >= $this->height) || ($xNeighbor < 0 || $xNeighbor >= $this->width)) {
                    continue;
                }

                // Check for "self"
                if ($xNeighbor == $cell->getPositionX() && $yNeighbor == $cell->getPositionY()) {
                    continue;
                }

                if ($this->cells[$xNeighbor][$yNeighbor]->getState() == Cell::STATE_ALIVE) {
                    $neighbors++;
                }
            }
        }

        return $neighbors;
    }

    /**
     * Reset terminal
     *
     * @return void
     */
    protected function clear()
    {
        echo "\033[0;0H";
    }
}
