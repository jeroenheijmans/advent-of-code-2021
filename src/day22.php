<?php

ini_set('memory_limit', '512M');
require_once "../vendor/autoload.php";
use Illuminate\Support\Collection;
function collect($value = null) { return new Collection($value); }

$data = preg_split("/\r?\n/", trim($input));

function solvePart1() {
  return -1;
}

function solvePart2() {
  return -1;
}

echo "Solution 1: " . solvePart1() . "\n";
echo "Solution 2: " . solvePart2() . "\n";
