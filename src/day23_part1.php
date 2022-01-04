<?php

ini_set('memory_limit', '512M');
require_once "../vendor/autoload.php";
use Illuminate\Support\Collection;
function collect($value = null) { return new Collection($value); }

$input = "
#############
#...........#
###A#C#B#A###
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
        return $this->key === "2,2" || ($this->key === "2,1" && array_key_exists("2,2", $state) && $state["2,2"] === "A");
      case "B":
        return $this->key === "4,2" || ($this->key === "4,1" && array_key_exists("4,2", $state) && $state["4,2"] === "B");
      case "C":
        return $this->key === "6,2" || ($this->key === "6,1" && array_key_exists("6,2", $state) && $state["6,2"] === "C");
      case "D":
        return $this->key === "8,2" || ($this->key === "8,1" && array_key_exists("8,2", $state) && $state["8,2"] === "D");
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
    
    $this->locations->get("4,0")->linkTo($this->locations->get("4,1"));
    $this->locations->get("4,1")->linkTo($this->locations->get("4,2"));
    
    $this->locations->get("6,0")->linkTo($this->locations->get("6,1"));
    $this->locations->get("6,1")->linkTo($this->locations->get("6,2"));
    
    $this->locations->get("8,0")->linkTo($this->locations->get("8,1"));
    $this->locations->get("8,1")->linkTo($this->locations->get("8,2"));
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
    "4,1" => new Location(4,1),
    "4,2" => new Location(4,2),
    "6,1" => new Location(6,1),
    "6,2" => new Location(6,2),
    "8,1" => new Location(8,1),
    "8,2" => new Location(8,2),
  ])
);

$board = [
  "2,1" => $data[2][3],
  "2,2" => $data[3][3],
  "4,1" => $data[2][5],
  "4,2" => $data[3][5],
  "6,1" => $data[2][7],
  "6,2" => $data[3][7],
  "8,1" => $data[2][9],
  "8,2" => $data[3][9],
];

function sameState(&$a, &$b) {
  return empty(array_diff_assoc($a, $b));
}

$endstate = [
  "2,1" => "A",
  "2,2" => "A",
  "4,1" => "B",
  "4,2" => "B",
  "6,1" => "C",
  "6,2" => "C",
  "8,1" => "D",
  "8,2" => "D",
];

function isEndState(&$state) {
  global $endstate;

  return sameState($state, $endstate);
}

function isOnBoard($x, $y) {
  return ($y === 0 && ($x >=0 && $x <= 10))
    || (($y === 1 || $y === 2) && ($x === 2 || $x === 4 || $x === 6 || $x === 8));
}

function printLevel($state) {
  for($y=0; $y<3; $y++) {
    for($x=-1; $x<12; $x++) {
      echo isOnBoard($x, $y) ? ($state["$x,$y"] ?? ".") : " ";
    }
    echo "\n";
  }
}

try {
  $colsOnTerminal = intval(trim(shell_exec('powershell $Host.UI.RawUI.WindowSize.Width')));
} catch (Exception $_) {
  echo "Warning! No powershell, no auto-width determining...\n";
  $colsOnTerminal = 120;
}

function printLevels($statesWithCost) {
  global $colsOnTerminal;
  $chunksize = intdiv($colsOnTerminal, 16);

  $all = (new Collection($statesWithCost))->chunk($chunksize);
  echo "\n";
  foreach ($all as $chunk) {
    for($y = 0; $y < 3; $y++) {
      for($tx = 0; $tx < $chunksize * 16; $tx++) {
        $i = intdiv($tx, 16);
        $currentState = $chunk->skip($i)->first();
        if (!$currentState) break;
        $x = $tx % 16;
        echo isOnBoard($x, $y) ? ($currentState[1]["$x,$y"] ?? ".") : " ";
      }
      echo "\n";
    }
    echo "\n";
    echo "\n";
  }
}

function solvePart1($level, $board) {
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

    echo "Loop $loop considering lowest cost states at $lowestCost: total " . count($statesToConsiderNext) . " states out of " . count($newStatesWithCost) . " states (lowest known cost so far: $lowestKnownCostToEndState)\n";

    if ($lowestCost >= $lowestKnownCostToEndState) {
      echo "About to start checking states that are already equal to the best possible solution, so we're done!\n";
      return $lowestKnownCostToEndState;
    }

    //printLevels($statesToConsiderNext);
    //if ($loop === 150) return -3;

    foreach ($statesToConsiderNext as $state) {
      if (in_array($state, $visited)) continue;
      else array_push($visited, $state);

      foreach ($state as $coords => $unit) {
        $targets = $level->locations->get($coords)->findTargetsFor($state, $coords);
        // echo "Loop $loop checking $unit at $coords giving " . count($targets) . " extra targets\n";

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

function solvePart2($level, $board) {
  return -1;
}

echo "Solution 1: " . solvePart1($level, $board) . "\n";
echo "Solution 2: " . solvePart2($level, $board) . "\n";
