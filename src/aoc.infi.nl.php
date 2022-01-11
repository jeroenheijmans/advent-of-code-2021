<?php

ini_set('memory_limit', '512M');
require_once "../vendor/autoload.php";
use Illuminate\Support\Collection;
function collect($value = null) { return new Collection($value); }

$input = "
628669 onderdelen missen
Lightsaber: 47 Batterij, 41 Unobtanium
HandheldComputer: 3 Batterij, 79 Printplaat, 29 Plastic
ElectrischeRacebaan: 47 AutoChassis, 31 Printplaat, 3 Plastic, 43 Batterij, 13 Wiel
QuadDrone: 89 Accu, 59 Plastic, 47 Printplaat
PikachuPlushy: 11 Batterij
Trampoline: 13 Schokdemper, 43 IJzer
BatmobileReplica: 17 BatmobileChassis, 11 Schokdemper, 2 Unobtanium, 37 Wiel
DanceDanceRevolutionMat: 2 Schokdemper, 31 Batterij
Printplaat: 59 Hars, 3 Koper, 41 Chip, 31 Led
Accu: 5 Batterij
Schokdemper: 61 IJzer, 41 Staal
Batterij: 61 Staal
BatmobileChassis: 59 AutoChassis, 3 Staal
AutoChassis: 67 IJzer
Wiel: 2 Rubber, 37 IJzer
Unobtanium: 83 IJzer, 89 Kryptonite
";

$data = explode(PHP_EOL, trim($input));
$rules = [];
$partnames = [];
foreach ($data as $line) {
  if (str_contains($line, "onderdelen")) continue;
  preg_match("/(\w+): (.+)/", $line, $matches);
  $parts = explode(", ", $matches[2]);
  $rule = [];
  foreach ($parts as $part) {
    $tuple = explode(" ", $part);
    $rule[$tuple[1]] = $tuple[0];
    array_push($partnames, $tuple[1]);
  }
  $rules[$matches[1]] = $rule;
}

function recursePartCount($part) {
  global $rules;
  if (!array_key_exists($part, $rules)) return 1;
  $result = 0;
  foreach ($rules[$part] as $key => $val) {
    $result += recursePartCount($key) * $val;
  }
  return $result;
}

function solvePart1() {
  global $rules;
  $totals = array_map(recursePartCount(...), array_keys($rules));
  return max($totals);
}

function solvePart2($missingPartsLine) {
  $missingParts = intval(explode(" ", $missingPartsLine)[0]);
  global $rules, $partnames;

  $totals = array_reduce(array_keys($rules), function($result, $current) {
    global $partnames;
    if (!in_array($current, $partnames)) $result[$current] = recursePartCount($current);
    return $result;
  }, array());

  uasort($totals, fn($a, $b) => $a === $b ? 0 : ($a > $b ? 1 : -1));
  print_r($totals);
  echo "Looking to create 20 pieces of toys total worth $missingParts parts.\n";
}


echo "Solution 1: " . solvePart1() . "\n";
echo "Solution 2: " . solvePart2($data[0]) . "\n";