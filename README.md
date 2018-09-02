# Conway's Game of Life

## Introduction

The universe of the Game of Life is an infinite two-dimensional orthogonal grid of square cells, each of which is in one of two possible states, alive or dead, or "populated" or "unpopulated". Every cell interacts with its eight neighbours, which are the cells that are horizontally, vertically, or diagonally adjacent. 

At each step in time, the following transitions occur:

* Any live cell with fewer than two live neighbours dies, as if caused by underpopulation.
* Any live cell with two or three live neighbours lives on to the next generation.
* Any live cell with more than three live neighbours dies, as if by overpopulation.
* Any dead cell with exactly three live neighbours becomes a live cell, as if by reproduction.

The initial pattern constitutes the seed of the system. The first generation is created by applying the above rules simultaneously to every cell in the seed—births and deaths occur simultaneously, and the discrete moment at which this happens is sometimes called a tick (in other words, each generation is a pure function of the preceding one). The rules continue to be applied repeatedly to create further generations.

https://en.wikipedia.org/wiki/Conway%27s_Game_of_Life


## Requirements

* php > 7.x

## Usage

1. Clone this repo locally
2. Run the "run" script

`git clone https://github.com/bad-mushroom/game-of-life ./game-of-life && cd game-of-life && php run.php`

## Example

![Screenshot](http://blog.chaoscontrol.org/wp-content/uploads/2018/09/gol_example.gif)

## Next Steps

- [ ] Make a composer package? At least make PSR compliant
- [ ] Add a "pre death" state. This would show a ☠️icon for 1 frame to any cells marked as dead. Might make for a cool visual effect.
- [ ] Show stats: Total living, total dead, total stable, FPS, etc
