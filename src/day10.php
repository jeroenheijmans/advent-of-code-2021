<?php

require_once '../vendor/autoload.php';

use Illuminate\Support\Collection;

function collect($value = null)
{
    return new Collection($value);
}

$input = "
test1,a
test2,a
test2,b
";

$data = collect(preg_split("/\r?\n/", trim($input)));

var_dump($data->chunk(1)->toArray());

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