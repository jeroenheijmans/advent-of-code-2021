<?php

require_once "../vendor/autoload.php";

use Illuminate\Support\Collection;

function collect($value = null)
{
    return new Collection($value);
}

$input = "
target area: x=20..30, y=-10..-5
";

preg_match("/x=(-?\d+)..(-?\d+), y=(-?\d+)..(-?\d+)/", trim($input), $matches);
$data = array_map('intval', $matches);

function solvePart1($data) {
  
  // determine minimal X velocity translate to minimal T
  // determine maximum X velocity translate to maximal T

  // find minimum Y velocity (must be positive, right?)
  // find maximum Y velocity

  // loop through all options
  //  determine highest point
  //  save maximum high point

  return -1;
}

function solvePart2($data) {
  return -1;
}

echo "Solution 1: " . solvePart1($data) . "\n";
echo "Solution 2: " . solvePart2($data) . "\n";
