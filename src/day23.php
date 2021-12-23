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

class Pawn {
  function __construct(
    public $color,
  ) {
    if ($color === "A") $this->step = 1;
    if ($color === "B") $this->step = 10;
    if ($color === "C") $this->step = 100;
    if ($color === "D") $this->step = 1000;
  }
}

class Location {
  function __construct(
    public $coords,
    public $targetFor,
    public $isStop = false,
    public $pawn = null,
  ) {}
}

function printlevel($locations) {
  for ($y = 0; $y < 5; $y++) {
    for ($x = 0; $x < 13; $x++) {
      $location = $locations->get("$y,$x");
      if ($location !== null) echo $location->pawn?->color ?? "·";
      else echo " ";
    }
    echo "\n";
  }
}

function solvePart1($data) {
  $locations = new Collection();
  for ($y = 1; $y < 4; $y++) {
    for ($x = 1; $x < 12; $x++) {
      if (!array_key_exists($x, $data[$y])) continue;
      if (preg_match("/[.ABCD]/", $data[$y][$x])) {
        $targetFor = ($x === 3 && $y > 1) ? "A" : null;
        $targetFor = ($x === 5 && $y > 1) ? "B" : null;
        $targetFor = ($x === 7 && $y > 1) ? "C" : null;
        $targetFor = ($x === 9 && $y > 1) ? "D" : null;

        $isStop = $y > 1 && ($x === 3 || $x === 5 || $x === 7 || $x === 9);

        $pawn = preg_match("/[ABCD]/", $data[$y][$x])
          ? new Pawn($data[$y][$x])
          : null;

        $locations->put(
          "$y,$x",
          new Location(
            [$y, $x],
            $targetFor,
            $isStop,
            $pawn
          )
        );
      }
    }
  }

  printlevel($locations);

  /*
  Okay once more manually:
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

111
#############
#AA.......BB#
### #C# # ###
  #D#D# #C#
  #########

1111
#############
#AA.......BB#
### # #C# ###
  #D#D#C# #
  #########

18111
#############
#AA.......BB#
### # #C#D###
  # # #C#D#
  #########

18251
#############
#AA.......  #
### #B#C#D###
  # #B#C#D#
  #########

18257
#############
#  .......  #
###A#B#C#D###
  #A#B#C#D#
  #########
  */

  
  return 18257;
}

function solvePart2($data) {
  return -1;
}

echo "Solution 1: " . solvePart1($data) . "\n";
echo "Solution 2: " . solvePart2($data) . "\n";
