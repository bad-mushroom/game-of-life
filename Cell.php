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
     * @param int $position_x   Position at matrix width
     * @param int $position_y    Position at matrix height
     */
    public function __construct(int $position_x, int $position_y)
    {
        $this->position_x = $position_x;
        $this->position_y = $position_y;

        $this->setInitialState();
    }

    /**
     * Set Initial State
     *
     * Sets the initial state of a Cell, at random, to be either "alive" or "dead".
     * @return void
     */
    protected function setInitialState()
    {
        $this->state = (rand(0, 5) === 1) ? 1 : 0;
    }

    /**
     * State property getter.
     *
     * @return int Current state of Cell
     */
    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getPositionX()
    {
        return $this->position_x;
    }

    public function getPositionY()
    {
        return $this->position_y;
    }

}
