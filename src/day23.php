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
  public $key;
  public $linkedLocations;

  function __construct(
    public $x,
    public $y,
  ) {
    $this->key = "$x,$y";
    $this->linkedLocations = new Collection();
  }

  function linkTo($otherLocation) {
    $this->linkedLocations->push($otherLocation);
    $otherLocation->linkedLocations->push($this);
  }
}

class Level {
  function __construct(
    public $locations = new Collection(),
  ) { }

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

function solvePart1($level, $board) {

  $links = new Collection([
    "0,0"  => new Collection([       "1,0"]),
    "1,0"  => new Collection(["0,0", "2,0"]),
    "2,0"  => new Collection(["1,0", "3,0", "2,1"]),
    "3,0"  => new Collection(["2,0", "4,0"]),
    "4,0"  => new Collection(["3,0", "5,0", "4,1"]),
    "5,0"  => new Collection(["4,0", "6,0"]),
    "6,0"  => new Collection(["5,0", "7,0", "6,1"]),
    "7,0"  => new Collection(["6,0", "8,0"]),
    "8,0"  => new Collection(["7,0", "9,0", "8,1"]),
    "9,0"  => new Collection(["8,0", "10,0"]),
    "10,0" => new Collection(["9,0", ]),

    "2,1"  => new Collection(["2,0", "2,2"]),
    "2,2"  => new Collection(["2,1"]),
    "4,1"  => new Collection(["4,0", "4,2"]),
    "4,2"  => new Collection(["4,1"]),
    "6,1"  => new Collection(["6,0", "6,2"]),
    "6,2"  => new Collection(["6,1"]),
    "8,1"  => new Collection(["8,0", "8,2"]),
    "8,2"  => new Collection(["8,1"]),
  ]);

  $statesWithCost = [[0, $board]];

  // Get all possible moves with their cost
  $possibleStates = [];
  foreach ($statesWithCost as [$cost, $state]) {
    foreach ($state as $coords => $unit) {
      
      // All variants where you are at your destination already:
      if ($unit === "A" && $coords === "2,2") $targets = [];
      else if ($unit === "A" && $coords === "2,1" && $state["2,2"] === "A") $targets = [];
      else if ($unit === "B" && $coords === "4,2") $targets = [];
      else if ($unit === "B" && $coords === "4,1" && $state["2,2"] === "B") $targets = [];
      else if ($unit === "C" && $coords === "6,2") $targets = [];
      else if ($unit === "C" && $coords === "6,1" && $state["2,2"] === "C") $targets = [];
      else if ($unit === "D" && $coords === "8,2") $targets = [];
      else if ($unit === "D" && $coords === "8,1" && $state["2,2"] === "D") $targets = [];

      // Look for allowed, reachable positions:
      else {
        $potentialTargets = [];
        while (true) {
          // Ugh... now what?
          break;
        }
      }

      $targets = $level->legalTargetsFOr($coords, $unit, $state);
      echo "Targets for $coords / $unit are:\n";
      print_r($targets);
    }
  }

  return -1;
}

function solvePart2($level, $board) {
  return -1;
}

echo "Solution 1: " . solvePart1($level, $board) . "\n";
echo "Solution 2: " . solvePart2($level, $board) . "\n";
