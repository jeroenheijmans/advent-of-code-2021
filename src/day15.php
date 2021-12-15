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
  public $cheapestKnownRoute = PHP_INT_MAX;

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
    if ($y > 0) $nodes[$y][$x]->neighbors[$nodes[$y-1][$x]->key] = $nodes[$y-1][$x];
    if ($x > 0) $nodes[$y][$x]->neighbors[$nodes[$y][$x-1]->key] = $nodes[$y][$x-1];
    if ($y < $size-1) $nodes[$y][$x]->neighbors[$nodes[$y+1][$x]->key] = $nodes[$y+1][$x];
    if ($x < $size-1) $nodes[$y][$x]->neighbors[$nodes[$y][$x+1]->key] = $nodes[$y][$x+1];
  }
}

$nodes[0][0]->cheapestKnownRoute = 0;

function solvePart1($data, $nodes) {
  $size = count($data);
  $targetNodeKey = $size-1 . "," . $size-1;

  $visited = new Collection();
  $toVisitNodes = new Collection([$nodes[0][0]->key => $nodes[0][0]]);

  $currentRiskLevel = 0;

  while ($currentRiskLevel++ < 100) {
    // echo "Considering risk level $currentRiskLevel\n";
    // echo "\nConsidering risk level $currentRiskLevel and already visited: " . implode(" | ", $visited->keys()->toArray()) . "\n";
    // echo "\nConsidering risk level $currentRiskLevel and considering next: " . implode(" | ", $toVisitNodes->keys()->toArray()) . "\n";

    $nextUpNodes = new Collection();

    foreach ($toVisitNodes as $source) {
      if ($visited->has($source->key)) throw new Error("Already visited " . $source->key);

      foreach ($source->neighbors as $target) {
        if ($visited->has($target->key) || $toVisitNodes->has($target->key)) {
          // echo "Ignoring " . $target->key . " as it's already in play\n";
          unset($source->neighbors[$target->key]);
          continue;
        }

        $costToReachFromSource = $source->cheapestKnownRoute + $target->risk;
        // echo "Cost to reach " . $target->key . " is $costToReachFromSource\n";
        if ($costToReachFromSource > $currentRiskLevel) continue; // not yet its turn

        unset($source->neighbors[$target->key]);


        if (!$nextUpNodes->has($target->key)) {
          // echo "Making it next up...\n";
          $nextUpNodes->put($target->key, $target);
        }

        $target->cheapestKnownRoute = min($costToReachFromSource, $target->cheapestKnownRoute);
      }

      // echo "Checking if " . $source->key . " is empty, neighbors are now: " . implode(" | ", array_keys($source->neighbors)) . "\n";
      
      if (empty($source->neighbors)) {
        // echo "It's visited now...\n";
        $visited->put($source->key, $source);
      }
      else {
        // echo "It's going to be next up again...\n";
        $nextUpNodes->put($source->key, $source); // visit it again! possibly with less neighbors
      }
    }

    if ($visited->has($targetNodeKey)) {
      return $visited->get($targetNodeKey)->cheapestKnownRoute;
    }

    $toVisitNodes = $nextUpNodes;
  }

  return -1;
}

function solvePart2($data) {
  return -1;
}

echo "Solution 1: " . solvePart1($data, $nodes) . "\n";
echo "Solution 2: " . solvePart2($data) . "\n";
