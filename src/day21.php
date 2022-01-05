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

  while (true) {
    for ($i=0; $i<3; $i++) {
      if (++$die === 101) $die = 1;
      $rolls++;
      $p1 += ($die % 10);
      if ($p1 > 10) $p1 -= 10;
    }
    $score1 += $p1;
    if ($score1 >= 1000) break;

    for ($i=0; $i<3; $i++) {
      if (++$die === 101) $die = 1;
      $rolls++;
      $p2 += ($die % 10);
      if ($p2 > 10) $p2 -= 10;
    }
    $score2 += $p2;
    if ($score2 >= 1000) break;
  }

  return min($score1, $score2) * $rolls;
}

function playRecursive($players, $activePlayer = 0, $rollsLeft = 3) {
  if ($rollsLeft === 0) {
    $newscore = $players[$activePlayer][1] + $players[$activePlayer][0];
    if ($newscore >= 8) {
      return $activePlayer === 0 ? [1, 0] : [0, 1];
    }
    $players[$activePlayer][1] = $newscore;
    return playRecursive($players, $activePlayer === 0 ? 1 : 0);
  } else {
    $rollsLeft--;
    $players1 = $players;
    $players2 = $players;
    $players3 = $players;
    $players1[$activePlayer][0] += 1;
    $players2[$activePlayer][0] += 2;
    $players3[$activePlayer][0] += 3;
    if ($players1[$activePlayer][0] > 10) $players1[$activePlayer][0] -= 10;
    if ($players2[$activePlayer][0] > 10) $players2[$activePlayer][0] -= 10;
    if ($players3[$activePlayer][0] > 10) $players3[$activePlayer][0] -= 10;
    $result1 = playRecursive($players1, $activePlayer, $rollsLeft);
    $result2 = playRecursive($players2, $activePlayer, $rollsLeft);
    $result3 = playRecursive($players3, $activePlayer, $rollsLeft);

    return [
      $result1[0] + $result2[0] + $result3[0],
      $result1[1] + $result2[1] + $result3[1],
    ];
  }
}

function solvePart2() {
  $p1 = 4;
  $p2 = 8;
  $result = playRecursive([[$p1, 0], [$p2, 0]]);
  return $result[0];
}

echo "Solution 1: " . solvePart1() . "\n";
echo "Solution 2: " . solvePart2() . "\n";
