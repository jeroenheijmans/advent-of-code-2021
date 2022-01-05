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

$rolls = [];
for ($die1 = 1; $die1 <= 3; $die1++)
  for ($die2 = 1; $die2 <= 3; $die2++)
    for ($die3 = 1; $die3 <= 3; $die3++)
      array_push($rolls, $die1 + $die2 + $die3);
$rollCounts = array_count_values($rolls);

$maxScore = 21;

$memoizedWinsByStateAndActivePlayer = [];

function playRecursive($state, $activePlayer = 0) {
  global $rollCounts, $maxScore;
  global $memoizedWinsByStateAndActivePlayer;

  $key = implode(";", [$state[0][0], $state[0][0], $state[0][0], $state[0][0], $activePlayer]);

  if (array_key_exists($key, $memoizedWinsByStateAndActivePlayer)) return $memoizedWinsByStateAndActivePlayer[$key];

  $winsPerPlayerInThisRound = [0, 0];

  foreach ($rollCounts as $roll => $occurences) {
    $newstate = $state; // Duplicate state
    $newstate[$activePlayer][0] += $roll; // Move by roll
    if ($newstate[$activePlayer][0] > 10) $newstate[$activePlayer][0] -= 10; // Wrap around
    $newstate[$activePlayer][1] += $newstate[$activePlayer][0]; // Add position to score

    if ($newstate[$activePlayer][1] >= $maxScore) {
      $winsPerPlayerInThisRound[$activePlayer] += $occurences;
    } else {
      $deeperWins = playRecursive($newstate, $activePlayer === 0 ? 1 : 0);
      $winsPerPlayerInThisRound[0] += $deeperWins[0] * $occurences;
      $winsPerPlayerInThisRound[1] += $deeperWins[1] * $occurences;
    }
  }

  $memoizedWinsByStateAndActivePlayer[$key] = $winsPerPlayerInThisRound;

  return $winsPerPlayerInThisRound;
}

function solvePart2() {
  global $maxScore;
  $p1 = 4;
  $p2 = 8;
  $result = playRecursive([[$p1, 0], [$p2, 0]]);
  
  return "\n    Using max score of $maxScore\n    Player 1 wins: $result[0]\n    Player 2 wins: $result[1]\n";
}

echo "Solution 1: " . solvePart1() . "\n";
echo "Solution 2: " . solvePart2() . "\n";
