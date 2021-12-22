<?php

ini_set('memory_limit', '512M');
require_once "../vendor/autoload.php";
use Illuminate\Support\Collection;
function collect($value = null) { return new Collection($value); }

$input = "
on x=-20..26,y=-36..17,z=-47..7
on x=-20..33,y=-21..23,z=-26..28
on x=-22..28,y=-29..23,z=-38..16
on x=-46..7,y=-6..46,z=-50..-1
on x=-49..1,y=-3..46,z=-24..28
on x=2..47,y=-22..22,z=-23..27
on x=-27..23,y=-28..26,z=-21..29
on x=-39..5,y=-6..47,z=-3..44
on x=-30..21,y=-8..43,z=-13..34
on x=-22..26,y=-27..20,z=-29..19
off x=-48..-32,y=26..41,z=-47..-37
on x=-12..35,y=6..50,z=-50..-2
off x=-48..-32,y=-32..-16,z=-15..-5
on x=-18..26,y=-33..15,z=-7..46
off x=-40..-22,y=-38..-28,z=23..41
on x=-16..35,y=-41..10,z=-47..6
off x=-32..-23,y=11..30,z=-14..3
on x=-49..-5,y=-3..45,z=-29..18
off x=18..30,y=-20..-8,z=-3..13
on x=-41..9,y=-7..43,z=-33..15
on x=-54112..-39298,y=-85059..-49293,z=-27449..7877
on x=967..23432,y=45373..81175,z=27513..53682
";

$data = preg_split("/\r?\n/", trim($input));

function solvePart1($data) {
  $lit = [];

  foreach ($data as $line) {
    preg_match("/(\S+) x=(-?\d+)..(-?\d+),y=(-?\d+)..(-?\d+),z=(-?\d+)..(-?\d+)/", $line, $matches);
    $instruction = $matches[1];
    $x1 = intval($matches[2]);
    $x2 = intval($matches[3]);
    $y1 = intval($matches[4]);
    $y2 = intval($matches[5]);
    $z1 = intval($matches[6]);
    $z2 = intval($matches[7]);

    $p1 = "$x1;$y1;$z1";
    $p2 = "$x2;$y2;$z2";

    for ($x = max(-50, min($x1, $x2)); $x <= min(50, max($x1, $x2)); $x++) {
      for ($y = max(-50, min($y1, $y2)); $y <= min(50, max($y1, $y2)); $y++) {
        for ($z = max(-50, min($z1, $z2)); $z <= min(50, max($z1, $z2)); $z++) {
          $lit["$x;$y;$z"] = $instruction === "on" ? true : false;
        }
      }
    }
  }

  return count(array_filter($lit, fn($p) => $p));
}

class Cube {
  function __construct(
    public $on = "on",
    public $from = [],
    public $to = [],
  ) {}

  public function combine($other) {
    // TODO: combine them into new cubes
    return [];
  }
}

function solvePart2($data) {
  $cubes = new Collection([
    new Cube("off", [PHP_INT_MIN, PHP_INT_MIN, PHP_INT_MIN], [PHP_INT_MAX, PHP_INT_MAX, PHP_INT_MAX]),
  ]);

  foreach ($data as $line) {
    preg_match("/(\S+) x=(-?\d+)..(-?\d+),y=(-?\d+)..(-?\d+),z=(-?\d+)..(-?\d+)/", $line, $matches);
    $instruction = $matches[1];
    $x1 = intval($matches[2]);
    $x2 = intval($matches[3]);
    $y1 = intval($matches[4]);
    $y2 = intval($matches[5]);
    $z1 = intval($matches[6]);
    $z2 = intval($matches[7]);

    $newCube = new Cube($instruction, [$x1, $y1, $z1], [$x2, $y2, $z2]);
    $newCubes = new Collection([$newCube]);
    
    foreach($cubes as $otherCube) {
      $results = $otherCube->combine($newCube);
      $newCubes->concat($results);
    }

    $cubes = $newCubes;
  }

  return -1; // TODO: Count how many cubes fall in "on" areas
}

echo "Solution 1: " . solvePart1($data) . "\n";
echo "Solution 2: " . solvePart2($data) . "\n";
