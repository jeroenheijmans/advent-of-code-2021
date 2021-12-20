<?php

ini_set('memory_limit', '512M');
require_once "../vendor/autoload.php";
use Illuminate\Support\Collection;
function collect($value = null) { return new Collection($value); }

$input = "
..#.#..#####.#.#.#.###.##.....###.##.#..###.####..#####..#....#..#..##..##
#..######.###...####..#..#####..##..#.#####...##.#.#..#.##..#.#......#.###
.######.###.####...#.##.##..#..#..#####.....#.#....###..#.##......#.....#.
.#..#..##..#...##.######.####.####.#.#...#.......#..#.#.#...####.##.#.....
.#..#...##.#.##..#...##.#.##..###.#......#.#.......#.#.#.####.###.##...#..
...####.#..#..#.##.#....##..#.####....##...##..#...#......#.#.......#.....
..##..####..#...#.#.#...##..#.#..###..#####........#..####......#..#

#..#.
#....
##..#
..#..
..###
";

function bin2image($binstring) { return str_replace("1", "#", str_replace("0", ".", $binstring)); }
function image2bin($binstring) { return str_replace("#", "1", str_replace(".", "0", $binstring)); }
function printimg($img) {
  foreach ($img as $line) {
    foreach ($line as $char) {
      echo $char === "1" ? "#" : ".";
    }
    echo "\n";
  }
}

$data = preg_split("/\r?\n/", trim(image2bin($input)));

$algo = "";
$rest = false;
$image = [];
foreach ($data as $line) {
  if (empty($line)) $rest = true;
  else if (!$rest) {
    $algo .= $line;
  }
  else {
    $row = [];
    foreach (str_split($line) as $char) {
      array_push($row, $char);
    }
    array_push($image, $row);
  }
}

function solvePart1($algo, $img) {
  return -1;
}

function solvePart2($algo, $img) {
  return -1;
}

echo "Solution 1: " . solvePart1($algo, $img) . "\n";
echo "Solution 2: " . solvePart2($algo, $img) . "\n";
