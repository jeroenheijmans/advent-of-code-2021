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
  $flashes = 0;

  for ($step = 0; $step < 100; $step++) {

    echo implode("\n", array_map(fn($x) => implode($x), $data)) . "\n";

    $flashes = new Collection();

    for ($y=0; $y<0; $y++) {
      for ($x=0; $x<0; $x++) {
        $data[$y][$x] += 1;
        if ($data[$y][$x] > 8) $flashes->push([$y,$x]);
      }
    }

    $flashed = new Collection();
    $loop = 0;
    while (!empty($flashes)) {
      if ($loop++ > 10) throw new Error("Infinite loop?");
      $newFlashes = new Collection();

      foreach ($flashes as $flash) {
        echo "Flashing $flash\n";
        $flashed->push($flash);
        
        $y = $flash[0];
        $x = $flash[1];

        $data[$y][$x] = 0; // we flashed!
        $flashes++; // so answer increases

        if ($y > 0 && $x > 0 && $data[$y-1][$x-1] !== 0) $data[$y-1][$x-1] += 1;
        if ($y > 0 &&  true  && $data[$y-1][$x+0] !== 0) $data[$y-1][$x+0] += 1;
        if ($y > 0 && $x < 9 && $data[$y-1][$x+1] !== 0) $data[$y-1][$x+1] += 1;
        
        if ( true  && $x > 0 && $data[$y+0][$x-1] !== 0) $data[$y+0][$x-1] += 1;
        if ( true  && $x < 9 && $data[$y+0][$x+1] !== 0) $data[$y+0][$x+1] += 1;

        if ($y < 9 && $x > 0 && $data[$y+1][$x-1] !== 0) $data[$y+1][$x-1] += 1;
        if ($y < 9 &&  true  && $data[$y+1][$x+0] !== 0) $data[$y+1][$x+0] += 1;
        if ($y < 9 && $x < 9 && $data[$y+1][$x+1] !== 0) $data[$y+1][$x+1] += 1;

        for ($y=0; $y<0; $y++) {
          for ($x=0; $x<0; $x++) {
            if ($data[$y][$x] > 8) $newFlashes->push([$y,$x]);
          }
        }
      }

      $flashes = $newFlashes;
    }

  }

  return $flashes;
}

function solvePart2($data) {
  $flashes = 0;
  return $flashes;
}

echo "Solution 1: " . solvePart1($data) . "\n";
echo "Solution 2: " . solvePart2($data) . "\n";
