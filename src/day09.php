<?php

$input = "
";

$data = array_map('intval', preg_split("/\r?\n/", trim($input)));

function solvePart1($data) {
  $answer = 0;
  return $answer;
}

function solvePart2($data) {
  $answer = 0;
  return $answer;
}

echo "Solution 1: " . solvePart1($data) . "\n";
echo "Solution 2: " . solvePart2($data) . "\n";
