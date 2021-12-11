<?php

require_once '../vendor/autoload.php';

use Illuminate\Support\Collection;

function collect($value = null)
{
    return new Collection($value);
}

$input = "
5483143223
2745854711
5264556173
6141336146
6357385478
4167524645
2176841721
6882881134
4846848554
5283751526
";

$data = array_map(
  fn($row) => array_map('intval', str_split($row)),
  preg_split("/\r?\n/", trim($input))
);

function solvePart1($data) {
  $answer = 0;

  for ($step = 0; $step < 100; $step++) {

    // echo "\nStep $step\n----\n";
    // echo implode("\n", array_map(fn($x) => implode(array_map(fn($d) => $d > 9 ? "*" : "$d", $x)), $data)) . "\n";

    $flashes = new Collection();

    for ($y=0; $y<10; $y++) {
      for ($x=0; $x<10; $x++) {
        $data[$y][$x] += 1;
        if ($data[$y][$x] > 9) $flashes->push([$y,$x]);
      }
    }

    $flashed = new Collection();
    $loop = 0;
    while (!$flashes->isEmpty()) {
      if ($loop++ > 25) throw new Error("Infinite loop?");
      $newFlashes = new Collection();

      // echo "Flashing total " . $flashes->count() . ": " . $flashes->map(fn($f) => implode(",", $f))->implode(" | ") . "\n";
      // echo implode("\n", array_map(fn($x) => implode(array_map(fn($d) => $d > 9 ? "*" : "$d", $x)), $data)) . "\n";

      foreach ($flashes as $flash) {
        $flashed->push($flash);

        $y = $flash[0];
        $x = $flash[1];

        $data[$y][$x] = 0; // we flashed!
        $answer++; // so answer increases

        if ($y > 0  && $x > 0 && $data[$y-1][$x-1] !== 0) $data[$y-1][$x-1] += 1;
        if ($y > 0  &&  true  && $data[$y-1][$x+0] !== 0) $data[$y-1][$x+0] += 1;
        if ($y > 0  && $x < 9 && $data[$y-1][$x+1] !== 0) $data[$y-1][$x+1] += 1;
        
        if ( true   && $x > 0 && $data[$y+0][$x-1] !== 0) $data[$y+0][$x-1] += 1;
        if ( true   && $x < 9 && $data[$y+0][$x+1] !== 0) $data[$y+0][$x+1] += 1;

        if ($y < 9 && $x > 0  && $data[$y+1][$x-1] !== 0) $data[$y+1][$x-1] += 1;
        if ($y < 9 &&  true   && $data[$y+1][$x+0] !== 0) $data[$y+1][$x+0] += 1;
        if ($y < 9 && $x < 9  && $data[$y+1][$x+1] !== 0) $data[$y+1][$x+1] += 1;
      }
      
      for ($y=0; $y<10; $y++) {
        for ($x=0; $x<10; $x++) {
          if ($data[$y][$x] > 9) $newFlashes->push([$y,$x]);
        }
      }

      $flashes = $newFlashes->unique();
    }
  }

  return $answer;
}

function solvePart2($data) {

  for ($step = 0; $step < 1000; $step++) {
    $answer = 0;

    // echo "\nStep $step\n----\n";
    // echo implode("\n", array_map(fn($x) => implode(array_map(fn($d) => $d > 9 ? "*" : "$d", $x)), $data)) . "\n";

    $flashes = new Collection();

    for ($y=0; $y<10; $y++) {
      for ($x=0; $x<10; $x++) {
        $data[$y][$x] += 1;
        if ($data[$y][$x] > 9) $flashes->push([$y,$x]);
      }
    }

    $flashed = new Collection();
    $loop = 0;
    while (!$flashes->isEmpty()) {
      if ($loop++ > 25) throw new Error("Infinite loop?");
      $newFlashes = new Collection();

      // echo "Flashing total " . $flashes->count() . ": " . $flashes->map(fn($f) => implode(",", $f))->implode(" | ") . "\n";
      // echo implode("\n", array_map(fn($x) => implode(array_map(fn($d) => $d > 9 ? "*" : "$d", $x)), $data)) . "\n";

      foreach ($flashes as $flash) {
        $flashed->push($flash);

        $y = $flash[0];
        $x = $flash[1];

        $data[$y][$x] = 0; // we flashed!
        $answer++; // so answer increases

        if ($y > 0  && $x > 0 && $data[$y-1][$x-1] !== 0) $data[$y-1][$x-1] += 1;
        if ($y > 0  &&  true  && $data[$y-1][$x+0] !== 0) $data[$y-1][$x+0] += 1;
        if ($y > 0  && $x < 9 && $data[$y-1][$x+1] !== 0) $data[$y-1][$x+1] += 1;
        
        if ( true   && $x > 0 && $data[$y+0][$x-1] !== 0) $data[$y+0][$x-1] += 1;
        if ( true   && $x < 9 && $data[$y+0][$x+1] !== 0) $data[$y+0][$x+1] += 1;

        if ($y < 9 && $x > 0  && $data[$y+1][$x-1] !== 0) $data[$y+1][$x-1] += 1;
        if ($y < 9 &&  true   && $data[$y+1][$x+0] !== 0) $data[$y+1][$x+0] += 1;
        if ($y < 9 && $x < 9  && $data[$y+1][$x+1] !== 0) $data[$y+1][$x+1] += 1;
      }
      
      for ($y=0; $y<10; $y++) {
        for ($x=0; $x<10; $x++) {
          if ($data[$y][$x] > 9) $newFlashes->push([$y,$x]);
        }
      }

      $flashes = $newFlashes->unique();
    }

    if ($answer === 100) return $step + 1; // ugh off by one 😝
  }

  return $answer;
}

echo "Solution 1: " . solvePart1($data) . "\n";
echo "Solution 2: " . solvePart2($data) . "\n";
