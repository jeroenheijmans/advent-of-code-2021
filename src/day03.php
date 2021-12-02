<?php

$input = "
";

$data = preg_split("/\r?\n/", trim($input));

function solvePart1($data) {
  $answer = -1;
  foreach ($data as $row) {
    $parts = preg_split("/ /", $row);
  }
  return $answer;
}

function solvePart2($data) {
  $answer = -1;
  foreach ($data as $row) {
    $parts = preg_split("/ /", $row);
  }
  return $answer;
}

echo "Solution 1: " . solvePart1($data) . "\n";
echo "Solution 2: " . solvePart2($data) . "\n";
