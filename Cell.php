<?php

class Cell
{
    const STATE_ALIVE = 1;
    const STATE_DEAD = 0;

    const DISPLAY_DEAD = '  ';
    const DISPLAY_ALIVE = '🙂';

    protected $state;
    protected $position_x;
    protected $position_y;

    /**
     * Cell Object
     *
     * @param int $position_x   Position at X axis
     * @param int $position_y   Position at Y axis
     */
    public function __construct(int $position_x, int $position_y)
    {
        $this->position_x = $position_x;
        $this->position_y = $position_y;

        $this->setInitialState();
    }

    /**
     * Sets the initial state of a Cell, at random, to be either "alive" or "dead".
     *
     * @return void
     */
    protected function setInitialState()
    {
        $this->state = (rand(0, 5) === 1) ? 1 : 0;
    }

    /**
     * State Getter
     *
     * @return int Current state of Cell
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * State Setter
     *
     * @param integer $state    State of cell
     */
    public function setState(int $state)
    {
        $this->state = $state;
    }

    /**
     * Position X Getter
     *
     * @return int Cell's X axis
     */
    public function getPositionX()
    {
        return $this->position_x;
    }

    /**
     * Position Y Getter
     *
     * @return int Cell's Y axis
     */
    public function getPositionY()
    {
        return $this->position_y;
    }

}
