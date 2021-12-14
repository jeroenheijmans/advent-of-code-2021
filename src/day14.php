<?php

ini_set('memory_limit', '512M');

require_once "../vendor/autoload.php";

use Illuminate\Support\Collection;

function collect($value = null)
{
    return new Collection($value);
}

$input = "
CKFFSCFSCBCKBPBCSPKP

NS -> P
KV -> B
FV -> S
BB -> V
CF -> O
CK -> N
BC -> B
PV -> N
KO -> C
CO -> O
HP -> P
HO -> P
OV -> O
VO -> C
SP -> P
BV -> H
CB -> F
SF -> H
ON -> O
KK -> V
HC -> N
FH -> P
OO -> P
VC -> F
VP -> N
FO -> F
CP -> C
SV -> S
PF -> O
OF -> H
BN -> V
SC -> V
SB -> O
NC -> P
CN -> K
BP -> O
PC -> H
PS -> C
NB -> K
VB -> P
HS -> V
BO -> K
NV -> B
PK -> K
SN -> H
OB -> C
BK -> S
KH -> P
BS -> S
HV -> O
FN -> F
FS -> N
FP -> F
PO -> B
NP -> O
FF -> H
PN -> K
HF -> H
VK -> K
NF -> K
PP -> H
PH -> B
SK -> P
HN -> B
VS -> V
VN -> N
KB -> O
KC -> O
KP -> C
OS -> O
SO -> O
VH -> C
OK -> B
HH -> B
OC -> P
CV -> N
SH -> O
HK -> N
NO -> F
VF -> S
NN -> O
FK -> V
HB -> O
SS -> O
FB -> B
KS -> O
CC -> S
KF -> V
VV -> S
OP -> H
KN -> F
CS -> H
CH -> P
BF -> F
NH -> O
NK -> C
OH -> C
BH -> O
FC -> V
PB -> B
";

$data = preg_split("/\r?\n/", trim($input));

function solvePart1($data) {
  $polymer = str_split($data[0]);
  $rules = collect($data)->skip(2)->map(fn($r) => str_split(str_replace(" -> ", "", $r)));

  for ($step = 0; $step < 10; $step++) {
    // echo implode($polymer) . "\n";
    $newPolymer = [];

    for ($i = 0; $i < count($polymer) - 1; $i++) {
      $rule = $rules->first(fn($r) => $r[0] === $polymer[$i] && $r[1] === $polymer[$i + 1]);
      // echo "Matched $polymer[$i] and $polymer[$i] with rule " . implode("/", $rule) . "\n";
      array_push($newPolymer, $polymer[$i], $rule[2]);
    }

    array_push($newPolymer, $polymer[count($polymer) - 1]);

    $polymer = $newPolymer;
  }

  $counts = collect(array_count_values($polymer));

  return $counts->max() - $counts->min();
}

function solvePart2($data) {
  $polymer = str_split($data[0]);
  $rules = collect($data)->skip(2)->map(fn($r) => str_split(str_replace(" -> ", "", $r)));

  $start = microtime(true);
  for ($step = 0; $step < 40; $step++) {
    // echo implode($polymer) . "\n";
    echo "Step $step polymer length " . count($polymer) . "\n";
    $newPolymer = [];

    for ($i = 0; $i < count($polymer) - 1; $i++) {
      $rule = $rules->first(fn($r) => $r[0] === $polymer[$i] && $r[1] === $polymer[$i + 1]);
      // echo "Matched $polymer[$i] and $polymer[$i] with rule " . implode("/", $rule) . "\n";
      array_push($newPolymer, $polymer[$i], $rule[2]);
    }

    array_push($newPolymer, $polymer[count($polymer) - 1]);

    $polymer = $newPolymer;
  }

  $counts = collect(array_count_values($polymer));

  return $counts->max() - $counts->min();
}

echo "Solution 1: " . solvePart1($data) . "\n";
echo "Solution 2: " . solvePart2($data) . "\n";
