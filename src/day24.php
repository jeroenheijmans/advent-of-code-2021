<?php

ini_set('memory_limit', '512M');
require_once "../vendor/autoload.php";
use Illuminate\Support\Collection;
function collect($value = null) { return new Collection($value); }

$input = "
inp w
mul x 0
add x z
mod x 26
div z 1
add x 13
eql x w
eql x 0
mul y 0
add y 25
mul y x
add y 1
mul z y
mul y 0
add y w
add y 6
mul y x
add z y
inp w
mul x 0
add x z
mod x 26
div z 1
add x 15
eql x w
eql x 0
mul y 0
add y 25
mul y x
add y 1
mul z y
mul y 0
add y w
add y 7
mul y x
add z y
inp w
mul x 0
add x z
mod x 26
div z 1
add x 15
eql x w
eql x 0
mul y 0
add y 25
mul y x
add y 1
mul z y
mul y 0
add y w
add y 10
mul y x
add z y
inp w
mul x 0
add x z
mod x 26
div z 1
add x 11
eql x w
eql x 0
mul y 0
add y 25
mul y x
add y 1
mul z y
mul y 0
add y w
add y 2
mul y x
add z y
inp w
mul x 0
add x z
mod x 26
div z 26
add x -7
eql x w
eql x 0
mul y 0
add y 25
mul y x
add y 1
mul z y
mul y 0
add y w
add y 15
mul y x
add z y
inp w
mul x 0
add x z
mod x 26
div z 1
add x 10
eql x w
eql x 0
mul y 0
add y 25
mul y x
add y 1
mul z y
mul y 0
add y w
add y 8
mul y x
add z y
inp w
mul x 0
add x z
mod x 26
div z 1
add x 10
eql x w
eql x 0
mul y 0
add y 25
mul y x
add y 1
mul z y
mul y 0
add y w
add y 1
mul y x
add z y
inp w
mul x 0
add x z
mod x 26
div z 26
add x -5
eql x w
eql x 0
mul y 0
add y 25
mul y x
add y 1
mul z y
mul y 0
add y w
add y 10
mul y x
add z y
inp w
mul x 0
add x z
mod x 26
div z 1
add x 15
eql x w
eql x 0
mul y 0
add y 25
mul y x
add y 1
mul z y
mul y 0
add y w
add y 5
mul y x
add z y
inp w
mul x 0
add x z
mod x 26
div z 26
add x -3
eql x w
eql x 0
mul y 0
add y 25
mul y x
add y 1
mul z y
mul y 0
add y w
add y 3
mul y x
add z y
inp w
mul x 0
add x z
mod x 26
div z 26
add x 0
eql x w
eql x 0
mul y 0
add y 25
mul y x
add y 1
mul z y
mul y 0
add y w
add y 5
mul y x
add z y
inp w
mul x 0
add x z
mod x 26
div z 26
add x -5
eql x w
eql x 0
mul y 0
add y 25
mul y x
add y 1
mul z y
mul y 0
add y w
add y 11
mul y x
add z y
inp w
mul x 0
add x z
mod x 26
div z 26
add x -9
eql x w
eql x 0
mul y 0
add y 25
mul y x
add y 1
mul z y
mul y 0
add y w
add y 12
mul y x
add z y
inp w
mul x 0
add x z
mod x 26
div z 26
add x 0
eql x w
eql x 0
mul y 0
add y 25
mul y x
add y 1
mul z y
mul y 0
add y w
add y 10
mul y x
add z y
";

$program = [];

foreach (explode(PHP_EOL, trim($input)) as $line) {
  if (preg_match("/inp (\w)/", $line, $matches)) array_push($program, ["inp", $matches[1]]);
  if (preg_match("/(\w\w\w) (\S+) (\S+)/", $line, $matches)) array_push($program, [$matches[1], $matches[2], $matches[3]]);
}

$data = array_map(intval(...), explode(PHP_EOL, trim($input)));

function runProgram($program, $inputs) {
  $memory = [
    "w" => 0,
    "x" => 0,
    "y" => 0,
    "z" => 0,
  ];

  $inputPos = 0;

  $pos = 0;
  $loop = 0;
  $MaxLoopCount = 1000;
  $maxpos = count($program);

  while ($loop++ < $MaxLoopCount) {
    // echo $program[$pos][0] . "\n"; print_r($memory);

    switch ($program[$pos][0]) {
      case "inp":
        $memory[$program[$pos][1]] = $inputs[$inputPos++];
        break;

      case "add":
        $t1 = $program[$pos][1];
        $t2 = $program[$pos][2];
        $memory[$t1] = (ctype_alpha($t1) ? $memory[$t1] : intval($t1)) + (ctype_alpha($t2) ? $memory[$t2] : intval($t2));
        break;

      case "mul":
        $t1 = $program[$pos][1];
        $t2 = $program[$pos][2];
        $memory[$t1] = (ctype_alpha($t1) ? $memory[$t1] : intval($t1)) * (ctype_alpha($t2) ? $memory[$t2] : intval($t2));
        break;

      case "div":
        $t1 = $program[$pos][1];
        $t2 = $program[$pos][2];
        $memory[$t1] = floor((ctype_alpha($t1) ? $memory[$t1] : intval($t1)) / (ctype_alpha($t2) ? $memory[$t2] : intval($t2)));
        break;

      case "mod":
        $t1 = $program[$pos][1];
        $t2 = $program[$pos][2];
        $memory[$t1] = (ctype_alpha($t1) ? $memory[$t1] : intval($t1)) % (ctype_alpha($t2) ? $memory[$t2] : intval($t2));
        break;

      case "eql":
        $t1 = $program[$pos][1];
        $t2 = $program[$pos][2];
        $memory[$t1] = (ctype_alpha($t1) ? $memory[$t1] : intval($t1)) === (ctype_alpha($t2) ? $memory[$t2] : intval($t2)) ? 1 : 0;
        break;
        
      default:
          break;
    }

    $pos++;

    if ($pos >= $maxpos) {
      // echo "Terminated program!\n";
      break;
    }
  }

  return $memory["z"];
}

function solvePart1($program): int {

  $result = runProgram($program, [1,3,5,7,9,2,4,6,8,9,9,9,9,9]);
  echo "Valid? $result\n";

  $inputs = 99999999999999;
  $loop = 0;
  do {
    while (str_contains("$inputs", "0")) $inputs--;
    echo "Checking $inputs\n";
    $input = array_map(intval(...), str_split("$inputs"));
    $result = runProgram($program, $input);
    if ($result === 1) break;

  } while (--$inputs > 0 && $loop++ < 10000);

  return $inputs;
}

function solvePart2($program): int {
  return -1;
}

echo "Solution 1: " . solvePart1($program) . "\n";
echo "Solution 2: " . solvePart2($program) . "\n";
