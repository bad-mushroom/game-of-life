<?php

spl_autoload_register(function ($class) {
    include $class . '.php';
});

// Board() takes 2 optional paramaters to set the height (int) and width (int).
$board = new Board();
$board->run();
