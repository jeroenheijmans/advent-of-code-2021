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

$level = [0 => [], 1 => [], 2 => []];

for ($x = 0; $x < 11; $x++) {
  $level[0][$x] = ".";
}

$level[1][2] = $data[2][3];
$level[2][2] = $data[2][3];

$level[1][4] = $data[2][5];
$level[2][4] = $data[2][5];

$level[1][6] = $data[2][7];
$level[2][6] = $data[2][7];

$level[1][8] = $data[2][9];
$level[2][8] = $data[2][9];

function show($level) {
  for ($y = 0; $y < 3; $y++) {
    for ($x = 0; $x < 11; $x++) {
      echo $level[$y][$x] ?? " ";
    }
    echo "\n";
  }
}

show($level);

function solvePart1($level) {

  $edgeLevelsByTotalCost = new Collection([
    0 => $level
  ]);

  $loop = 0;

  $sourceLevel = $level;

  while (true) {
    if (++$loop > 99) throw new Error("Took too long, have a bug?");

    $nextLevelsToConsiderWithTheirCost = new Collection();

    foreach ($sourceLevel as $y => $row) {
      foreach ($row as $x => $cell) {
        // Already at our destination:
        if ($cell === "A" && $y === 2 && $x === 2) continue;
        if ($cell === "A" && $y === 1 && $x === 2 && $level[2][2] === "A") continue;
        if ($cell === "B" && $y === 2 && $x === 4) continue;
        if ($cell === "B" && $y === 1 && $x === 4 && $level[2][4] === "B") continue;
        if ($cell === "C" && $y === 2 && $x === 6) continue;
        if ($cell === "C" && $y === 1 && $x === 6 && $level[2][6] === "C") continue;
        if ($cell === "D" && $y === 2 && $x === 8) continue;
        if ($cell === "D" && $y === 1 && $x === 8 && $level[2][8] === "D") continue;

        if (ctype_alpha($cell)) {
          if ($y === 2 && ctype_alpha($level[1][$x])) continue; // Someone's blocking us
          // etc.

          // Let's stop here. Seems this approach with straight up array for a level
          // will be easier to start with, but a lot harder to write navigation
          // logic for. So an all out OO approach seems better for part 1 after all.
          // Let's commit the current state before we throw it out... :P
        }
      }
    }

  }

  return -1;
}

function solvePart2($level) {
  return -1;
}

echo "Solution 1: " . solvePart1($level) . "\n";
echo "Solution 2: " . solvePart2($level) . "\n";
