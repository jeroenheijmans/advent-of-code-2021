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


$data = array_map(fn($x) => str_split($x), explode(PHP_EOL, trim($input)));

class Location {
  function __construct(
    public $y,
    public $x,
    public $pawn = ".",
  ) {
    $this->connections = new Collection();
  }
}

$locations = new Collection();

for ($x = 1; $x < 12; $x++) {
  $locations->put("1;$x", new Location($y=0, $x=$x));
}
for ($y = 2; $y < 4; $y++) {
  for ($x = 3; $x < 11; $x = $x + 2) {
    $locations->put("$y;$x", new Location($y, $x, $data[$y][$x]));
  }
}

function show($locations) {
  for ($y = 1; $y < 4; $y++) {
    for ($x = 0; $x < 12; $x++) {
      if ($locations->has("$y;$x")) echo $locations->get("$y;$x")->pawn;
      else echo " ";
    }
    echo "\n";
  }
}

show($locations);

function solvePart1($locations) {
  return -1;
}

function solvePart2($locations) {
  return -1;
}

echo "Solution 1: " . solvePart1($locations) . "\n";
echo "Solution 2: " . solvePart2($locations) . "\n";
