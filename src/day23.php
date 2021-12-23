<?php

ini_set('memory_limit', '512M');
require_once "../vendor/autoload.php";
use Illuminate\Support\Collection;
function collect($value = null) { return new Collection($value); }

$input = "
";

$data = preg_split("/\r?\n/", trim($input));

function solvePart1($data) {
  /*
    Manual attempt:

#############
#...........#
###A#C#B#A###
  #D#D#B#C#
  #########

11
#############
#AA.........#
### #C#B# ###
  #D#D#B#C#
  #########

311
#############
#AA.......c.#
### #C#B# ###
  #D#D#B# #
  #########

10311
#############
#AA.......c.#
### #C#B# ###
  # #D#B#D#
  #########

10511
#############
#AA.C.....c.#
### # #B# ###
  # #D#B#D#
  #########

17511
#############
#AA.C.....c.#
### # #B#D###
  # # #B#D#
  #########

17611
#############
#AA.C.....c.#
### #B# #D###
  # #B# #D#
  #########

18511
#############
#AA. ..... .#
### #B#C#D###
  # #B#C#D#
  #########

18517
#############
#  . ..... .#
###A#B#C#D###
  #A#B#C#D#
  #########
  */
  return 18517;
}

function solvePart2($data) {
  return -1;
}

echo "Solution 1: " . solvePart1($data) . "\n";
echo "Solution 2: " . solvePart2($data) . "\n";
