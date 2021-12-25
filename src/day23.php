<?php

ini_set('memory_limit', '512M');
require_once "../vendor/autoload.php";
use Illuminate\Support\Collection;
function collect($value = null) { return new Collection($value); }

$input = "
#############
#...........#
###B#C#B#D###
  #A#D#C#A#
  #########
";

$data = array_map(fn($x) => str_split($x), preg_split("/\r?\n/", trim($input)));

class Location {
  function __construct(
    public $y,
    public $x,
    public $pawn = ".",
  ) {

  }
}

$level = new Collection();
for ($y = 1; $y < 4; $y++) {
  for ($x = 1; $x < 12; $x++) {
    if (!array_key_exists($x, $data[$y])) continue;
    if ($data[$y][$x] === ".") $level->push(new Location($y, $x));
    if (ctype_alpha($data[$y][$x])) $level->push(new Location($y, $x, $data[$y][$x]));
  }
}

function printlevel($level) {
  for ($y = 0; $y < 5; $y++) {
    echo "\n";
    for ($x = 0; $x < 13; $x++) {
      if ($y > 2 && $x < 2) { echo " "; continue; }
      if ($y > 2 && $x > 10) { echo " "; continue; }
      $loc = $level->filter(fn($i) => $i->x === $x && $i->y === $y)->first();
      echo $loc ? $loc->pawn : "#";
    }
  }
  echo "\n";
}

printlevel($level);

function solvePart1($level) {
  return -1;
}

function solvePart2($level) {
  return -1;
}

echo "Solution 1: " . solvePart1($level) . "\n";
echo "Solution 2: " . solvePart2($level) . "\n";
