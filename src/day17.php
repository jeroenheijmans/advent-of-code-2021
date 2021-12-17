<?php

require_once "../vendor/autoload.php";

use Illuminate\Support\Collection;

function collect($value = null)
{
    return new Collection($value);
}

// $input = "target area: x=20..30, y=-10..-5";
$input = "target area: x=88..125, y=-157..-103";

preg_match("/x=(-?\d+)..(-?\d+), y=(-?\d+)..(-?\d+)/", trim($input), $matches);
$data = array_map('intval', $matches);

function solvePart($data, $part = 1) {
  $x1 = $data[1];
  $x2 = $data[2];
  $y1 = $data[3];
  $y2 = $data[4];

  $minvx = 0;
  do {
    $minvx++;
    $maxx = ($minvx * ($minvx + 1) ) / 2; // won't go any further than this
  } while ($maxx < $data[1]);

  $highest = 0;
  $count = 0;

  for ($startvx = $minvx; $startvx < $x2; $startvx++) {
    // echo "Running with vx $startvx...\n";
    for ($startvy = 2; $startvy < 250; $startvy++) {
      // echo "  Running with vy $startvy...\n";
      $vy = $startvy;
      $vx = $startvx;
      $x = 0;
      $y = 0;
      $maxy = 0;

      while ($y > $y1) {
        // echo "    At $x,$y should be within x [$x1, $x2] and y [$y1, $y2]\n";
        $x += $vx;
        $y += $vy;
        $vx = $vx === 0 ? 0 : $vx - 1;
        $vy--;
        $maxy = max($maxy, $y);
        
        if ($x >= $x1 && $x <= $x2 && $y <= $y2 && $y >= $y1) {
          // echo "$maxy max for vx=$startvx and vy=$startvy - hitting the box at $x,$y\n";
          $highest = max($highest, $maxy);
          $count++;
          break;
        }
      }
    }
  }

  return $part === 1 ? $highest : $count;
}

function solvePart2($data) {
  return -1;
}

echo "Solution 1: " . solvePart($data, 1) . "\n";
echo "Solution 2: " . solvePart($data, 2) . "\n";