<?php

ini_set('memory_limit', '512M');
require_once "../vendor/autoload.php";
use Illuminate\Support\Collection;
function collect($value = null) { return new Collection($value); }

$input = "
#############
#...........#
###A#C#B#A###
  #D#C#B#A#
  #D#B#A#C#
  #D#D#B#C#
  #########
";

$data = array_map(fn($x) => str_split($x), explode(PHP_EOL, trim($input)));

class Location {
  public $key;
  public $linkedLocations;

  function __construct(
    public $x,
    public $y,
  ) {
    $this->key = "$x,$y";
    $this->linkedLocations = new Collection();

    $this->isHallwayStop = $this->key === "0,0"
      || $this->key === "1,0"
      || $this->key === "3,0"
      || $this->key === "5,0"
      || $this->key === "7,0"
      || $this->key === "9,0"
      || $this->key === "10,0";
  }

  function __debugInfo() {
    return [
      "key" => $this->key,
      "linkedLocations" => "[" . implode(" | ", $this->linkedLocations->map(fn($x) => $x->key)->toArray()) . "]",
    ];
  }

  function linkTo($otherLocation) {
    $this->linkedLocations->push($otherLocation);
    $otherLocation->linkedLocations->push($this);
  }

  function isEndLocationFor(&$state, $unit) {
    switch ($unit) {
      case "A":
        $y2 = $state["2,2"] ?? null;
        $y3 = $state["2,3"] ?? null;
        $y4 = $state["2,4"] ?? null;
        return $this->key === "2,4"
          || $this->key === "2,3" && $y4 === "A"
          || $this->key === "2,2" && $y4 === "A" && $y3 === "A"
          || $this->key === "2,1" && $y4 === "A" && $y3 === "A" && $y2 === "A"
          ;
      case "B":
        $y2 = $state["4,2"] ?? null;
        $y3 = $state["4,3"] ?? null;
        $y4 = $state["4,4"] ?? null;
        return $this->key === "4,4"
          || $this->key === "4,3" && $y4 === "B"
          || $this->key === "4,2" && $y4 === "B" && $y3 === "B"
          || $this->key === "4,1" && $y4 === "B" && $y3 === "B" && $y2 === "B"
          ;
      case "C":
        $y2 = $state["6,2"] ?? null;
        $y3 = $state["6,3"] ?? null;
        $y4 = $state["6,4"] ?? null;
        return $this->key === "6,4"
          || $this->key === "6,3" && $y4 === "C"
          || $this->key === "6,2" && $y4 === "C" && $y3 === "C"
          || $this->key === "6,1" && $y4 === "C" && $y3 === "C" && $y2 === "C"
          ;
      case "D":
        $y2 = $state["8,2"] ?? null;
        $y3 = $state["8,3"] ?? null;
        $y4 = $state["8,4"] ?? null;
        return $this->key === "8,4"
          || $this->key === "8,3" && $y4 === "D"
          || $this->key === "8,2" && $y4 === "D" && $y3 === "D"
          || $this->key === "8,1" && $y4 === "D" && $y3 === "D" && $y2 === "D"
          ;
      default:
        throw new Error("Unknown unit $unit");
    }
  }

  function findTargetsFor(
    &$state,
    &$coords,
    $visited = [],
    $steps = 0,
  ) {
    $iAmTheEndGoal = $this->isEndLocationFor($state, $state[$coords]);

    // There are no targets for a unit that is at it's target
    if ($iAmTheEndGoal && $coords === $this->key) return new Collection();

    $baseTargets = new Collection();

    // Only add myself as a target if I'm not the start...
    if ($this->key !== $coords) {
      // ... AND EITHER I'm a goal
      if ($iAmTheEndGoal) {
        $baseTargets->push(["target" => $this->key, "steps" => $steps, "isgoal" => true]);
      }
      // ... OR I'm not a hallway-to-hallway move
      else if ($this->isHallwayStop && !str_ends_with($coords, ",0")) {
        $baseTargets->push(["target" => $this->key, "steps" => $steps, "isgoal" => false]);
      }
    }

    $visited = array_merge($visited, [$this->key]);

    // Walk on to further locations:
    $deeperTargets = $this->linkedLocations
      ->filter(fn($other) => !in_array($other->key, $visited)) // unvisited
      ->filter(fn($other) => !array_key_exists($other->key, $state)) // not taken by someone
      ->map(fn($other) => $other->findTargetsFor($state, $coords, $visited, $steps + 1))
      ->flatten(1)
    ;

    return $baseTargets->concat($deeperTargets);
  }
}

class Level {
  function __construct(
    public $locations,
  ) {
    $this->linkUpLocations();
  }

  function linkUpLocations() {
    $this->locations->get("0,0")->linkTo($this->locations->get("1,0"));
    $this->locations->get("1,0")->linkTo($this->locations->get("2,0"));
    $this->locations->get("2,0")->linkTo($this->locations->get("3,0"));
    $this->locations->get("3,0")->linkTo($this->locations->get("4,0"));
    $this->locations->get("4,0")->linkTo($this->locations->get("5,0"));
    $this->locations->get("5,0")->linkTo($this->locations->get("6,0"));
    $this->locations->get("6,0")->linkTo($this->locations->get("7,0"));
    $this->locations->get("7,0")->linkTo($this->locations->get("8,0"));
    $this->locations->get("8,0")->linkTo($this->locations->get("9,0"));
    $this->locations->get("9,0")->linkTo($this->locations->get("10,0"));
    
    $this->locations->get("2,0")->linkTo($this->locations->get("2,1"));
    $this->locations->get("2,1")->linkTo($this->locations->get("2,2"));
    $this->locations->get("2,2")->linkTo($this->locations->get("2,3"));
    $this->locations->get("2,3")->linkTo($this->locations->get("2,4"));
    
    $this->locations->get("4,0")->linkTo($this->locations->get("4,1"));
    $this->locations->get("4,1")->linkTo($this->locations->get("4,2"));
    $this->locations->get("4,2")->linkTo($this->locations->get("4,3"));
    $this->locations->get("4,3")->linkTo($this->locations->get("4,4"));
    
    $this->locations->get("6,0")->linkTo($this->locations->get("6,1"));
    $this->locations->get("6,1")->linkTo($this->locations->get("6,2"));
    $this->locations->get("6,2")->linkTo($this->locations->get("6,3"));
    $this->locations->get("6,3")->linkTo($this->locations->get("6,4"));
    
    $this->locations->get("8,0")->linkTo($this->locations->get("8,1"));
    $this->locations->get("8,1")->linkTo($this->locations->get("8,2"));
    $this->locations->get("8,2")->linkTo($this->locations->get("8,3"));
    $this->locations->get("8,3")->linkTo($this->locations->get("8,4"));
  }
}

$level = new Level(
  $locations = new Collection([
    "0,0" => new Location(0,0),
    "1,0" => new Location(1,0),
    "2,0" => new Location(2,0),
    "3,0" => new Location(3,0),
    "4,0" => new Location(4,0),
    "5,0" => new Location(5,0),
    "6,0" => new Location(6,0),
    "7,0" => new Location(7,0),
    "8,0" => new Location(8,0),
    "9,0" => new Location(9,0),
    "10,0" => new Location(10,0),
    "2,1" => new Location(2,1),
    "2,2" => new Location(2,2),
    "2,3" => new Location(2,3),
    "2,4" => new Location(2,4),
    "4,1" => new Location(4,1),
    "4,2" => new Location(4,2),
    "4,3" => new Location(4,3),
    "4,4" => new Location(4,4),
    "6,1" => new Location(6,1),
    "6,2" => new Location(6,2),
    "6,3" => new Location(6,3),
    "6,4" => new Location(6,4),
    "8,1" => new Location(8,1),
    "8,2" => new Location(8,2),
    "8,3" => new Location(8,3),
    "8,4" => new Location(8,4),
  ])
);

$board = [
  "2,1" => $data[2][3],
  "2,2" => $data[3][3],
  "2,3" => $data[4][3],
  "2,4" => $data[5][3],
  "4,1" => $data[2][5],
  "4,2" => $data[3][5],
  "4,3" => $data[4][5],
  "4,4" => $data[5][5],
  "6,1" => $data[2][7],
  "6,2" => $data[3][7],
  "6,3" => $data[4][7],
  "6,4" => $data[5][7],
  "8,1" => $data[2][9],
  "8,2" => $data[3][9],
  "8,3" => $data[4][9],
  "8,4" => $data[5][9],
];

function sameState(&$a, &$b) {
  return empty(array_diff_assoc($a, $b));
}

$endstate = [
  "2,1" => "A",
  "2,2" => "A",
  "2,3" => "A",
  "2,4" => "A",
  "4,1" => "B",
  "4,2" => "B",
  "4,3" => "B",
  "4,4" => "B",
  "6,1" => "C",
  "6,2" => "C",
  "6,3" => "C",
  "6,4" => "C",
  "8,1" => "D",
  "8,2" => "D",
  "8,3" => "D",
  "8,4" => "D",
];

function isEndState(&$state) {
  global $endstate;

  return sameState($state, $endstate);
}

function solvePart2($level, $board) {
  $costPerStep = ["A" => 1, "B" => 10, "C" => 100, "D" => 1000];
  $statesWithCost = [0 => [$board]];
  $loop = 0;
  $lowestKnownCostToEndState = PHP_INT_MAX;
  $visited = [];

  while (true) {
    if ($loop++ > 1_00_000) throw new Error("Max loop reached");

    $lowestCost = min(array_keys($statesWithCost));

    $newStatesWithCost = $statesWithCost; // clone array
    unset($newStatesWithCost[$lowestCost]); // remove entries we will consider next

    $statesToConsiderNext = $statesWithCost[$lowestCost];

    if ($loop % 10 === 0)
      echo "Loop $loop considering lowest cost states at $lowestCost: total " . count($statesToConsiderNext) . " states out of " . count($newStatesWithCost) . " states (lowest known cost so far: $lowestKnownCostToEndState)\n";

    if ($lowestCost >= $lowestKnownCostToEndState) {
      echo "About to start checking states that are already equal to the best possible solution, so we're done!\n";
      return $lowestKnownCostToEndState;
    }

    foreach ($statesToConsiderNext as &$state) {
      if (in_array($state, $visited)) continue;
      else array_push($visited, $state);

      foreach ($state as $coords => $unit) {
        $targets = $level->locations->get($coords)->findTargetsFor($state, $coords);

        // This can be more efficient but oh well:
        // Consider only the goal if one of the targets is the goal.
        $goals = $targets->filter(fn($entry) => $entry["isgoal"]);
        if (!$goals->empty()) $targets = $goals;
  
        foreach ($targets as ["target" => $target, "steps" => $steps]) {
          $newstate = $state;
          unset($newstate[$coords]);
          $newstate[$target] = $unit;
          $newcost = $lowestCost + ($steps * $costPerStep[$unit]);
          ksort($newstate);

          
          if (isEndState($newstate)) {
            $lowestKnownCostToEndState = min($lowestKnownCostToEndState, $newcost);
          } else {
            if (!array_key_exists($newcost, $newStatesWithCost)) $newStatesWithCost[$newcost] = [$newstate];
            else array_push($newStatesWithCost[$newcost], $newstate);
          }
        }
      }
    }

    $statesWithCost = $newStatesWithCost;
  }

  return -1;
}

echo "Solution 2: " . solvePart2($level, $board) . "\n";
