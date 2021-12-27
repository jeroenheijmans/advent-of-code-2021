<?php

ini_set('memory_limit', '512M');
require_once "../vendor/autoload.php";
use Illuminate\Support\Collection;
function collect($value = null) { return new Collection($value); }

$input = "
";

$data = array_map(intval(...), explode(PHP_EOL, trim($input)));

function solvePart1($data): int {
  return -1;
}

function solvePart2($data): int {
  return -1;
}

echo "Solution 1: " . solvePart1($data) . "\n";
echo "Solution 2: " . solvePart2($data) . "\n";
