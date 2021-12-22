<?php

ini_set('memory_limit', '512M');
require_once "../vendor/autoload.php";
use Illuminate\Support\Collection;
function collect($value = null) { return new Collection($value); }

$input = "
on x=-24..25,y=-36..8,z=-15..31
on x=-3..41,y=-15..30,z=-26..18
on x=0..45,y=-13..41,z=-13..32
on x=-48..-4,y=-6..39,z=-49..-1
on x=-40..12,y=-11..33,z=-24..28
on x=-40..7,y=-6..40,z=-25..20
on x=-16..29,y=-43..3,z=-23..25
on x=-20..33,y=-6..39,z=-2..49
on x=-46..5,y=-8..46,z=-1..44
on x=-29..18,y=-27..17,z=-32..22
off x=-39..-20,y=-32..-18,z=36..47
on x=-22..27,y=-5..42,z=-45..0
off x=-23..-6,y=29..40,z=-43..-26
on x=-29..21,y=-25..23,z=-9..38
off x=-45..-29,y=-6..12,z=-31..-19
on x=-12..35,y=-7..43,z=-21..27
off x=30..46,y=20..29,z=-3..15
on x=-11..37,y=0..44,z=-39..7
off x=17..35,y=-48..-38,z=-30..-21
on x=-18..27,y=-46..2,z=-5..48
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

    for ($x = min($x1, $x2); $x <= max($x1, $x2); $x++) {
      for ($y = min($y1, $y2); $y <= max($y1, $y2); $y++) {
        for ($z = min($z1, $z2); $z <= max($z1, $z2); $z++) {
          $p = "$x;$y;$z";
          $lit[$p] = $instruction === "on" ? true : false;
          //if ($lit[$p]) echo "$p is on\n";
        }
      }
    }
  }

  return count(array_filter($lit, fn($p) => $p));
}

function solvePart2($data) {
  return -1;
}

echo "Solution 1: " . solvePart1($data) . "\n";
echo "Solution 2: " . solvePart2($data) . "\n";
