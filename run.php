<?php

spl_autoload_register(function ($class) {
    include $class . '.php';
});

$board = new Board(25, 25);

while (true) {
    $board->render();
    $board->update();

}
