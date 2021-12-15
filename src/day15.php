<?php

require_once "../vendor/autoload.php";

use Illuminate\Support\Collection;

function collect($value = null)
{
    return new Collection($value);
}

$input = "
1163751742
1381373672
2136511328
3694931569
7463417111
1319128137
1359912421
3125421639
1293138521
2311944581
";

$data = array_map(fn($row) => array_map('intval', str_split($row)), preg_split("/\r?\n/", trim($input)));

class Node {
  public $key;

  public function __construct(
    public $y,
    public $x,
    public $risk,
    public $neighbors = [],
  ) {
    $this->key = "$y,$x";
  }
}

$size = count($data);
$nodes = [];

for ($y = 0; $y < $size; $y++) {
  $nodes[$y] = [];
  for ($x = 0; $x < $size; $x++) {
    $nodes[$y][$x] = new Node($y, $x, $data[$y][$x]);
  }
}

for ($y = 0; $y < $size; $y++) {
  for ($x = 0; $x < $size; $x++) {
    if ($y > 0) array_push($nodes[$y][$x]->neighbors, $nodes[$y-1][$x]);
    if ($x > 0) array_push($nodes[$y][$x]->neighbors, $nodes[$y][$x-1]);
    if ($y < $size-2) array_push($nodes[$y][$x]->neighbors, $nodes[$y+1][$x]);
    if ($x < $size-2) array_push($nodes[$y][$x]->neighbors, $nodes[$y][$x+1]);
  }
}

function solvePart1($data, $nodes) {
  $loop = 0;

  while ($loop++ < 10) {
    // loop through all edgeNodes
      // find minimum next step/risk
      // loop through all neighbors of said risk that have not been fully visited
      // remember the risk to reach each such node
      // loop
  }

  return -1;
}

function solvePart2($data) {
  return -1;
}

echo "Solution 1: " . solvePart1($data) . "\n";
echo "Solution 2: " . solvePart2($data) . "\n";
