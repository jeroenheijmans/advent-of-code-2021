<?php

ini_set('memory_limit', '512M');
require_once "../vendor/autoload.php";
use Illuminate\Support\Collection;
function collect($value = null) { return new Collection($value); }

function solvePart1() {
  $p1 = 4;
  $p2 = 5;
  $die = 100;
  $rolls = 0;

  $score1 = 0;
  $score2 = 0;

  for ($round = 1; $round < 1000; $round++) {
    echo "[Round $round] Player 1 rolls ";
    if (++$die === 101) $die = 1; $rolls++; echo " $die ";
    $p1 += ($die % 10); if ($p1 > 10) $p1 -= 10;
    if (++$die === 101) $die = 1; $rolls++; echo " $die ";
    $p1 += ($die % 10); if ($p1 > 10) $p1 -= 10;
    if (++$die === 101) $die = 1; $rolls++; echo " $die ";
    $p1 += ($die % 10); if ($p1 > 10) $p1 -= 10;
    $score1 += $p1; 
    echo " ending on $p1 scoring $score1\n";
    if ($score1 >= 1000) break;

    echo "[Round $round] Player 2 rolls ";
    if (++$die === 101) $die = 1; $rolls++; echo " $die ";
    $p2 += ($die % 10); if ($p2 > 10) $p2 -= 10;
    if (++$die === 101) $die = 1; $rolls++; echo " $die ";
    $p2 += ($die % 10); if ($p2 > 10) $p2 -= 10;
    if (++$die === 101) $die = 1; $rolls++; echo " $die ";
    $p2 += ($die % 10); if ($p2 > 10) $p2 -= 10;
    $score2 += $p2; 
    echo " ending on $p2 scoring $score2\n";

    // echo "Round $round scores are $score1 and $score2\n";
    if ($score2 >= 1000) break;
  }

  $answer = min($score1, $score2) * $rolls;
  echo "\nmin($score1, $score2) * $rolls = $answer\n";
}

function solvePart2() {
  return -1;
}

echo "Solution 1: " . solvePart1($data) . "\n";
echo "Solution 2: " . solvePart2($data) . "\n";
