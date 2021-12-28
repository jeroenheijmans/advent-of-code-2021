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

// Trying to 'compile' instructions into
function runDecompiledProgram($inputs) {
  $w = 0; $x = 0; $y = 0; $z = 0;

  $w = current($inputs); // inp w
  // echo "$w\n";
  // mul x 0
  $x = $z; // add x z
  $x %= 26; // mod x 26
  // $z = intdiv($z, 1); // div z 1
  $x += 13; // add x 13
  $x = $x === $w ? 0 : 1; // eql x w
  // $x = $x === 0 ? 1 : 0; // eql x 0
  $y = 0; // mul y 0
  $y += 25; // add y 25
  $y *= $x; // mul y x
  $y++; // add y 1
  $z *= $y; // mul z y
  $y = 0; // mul y 0
  $y += $w; // add y w
  $y += 6; // add y 6
  $y *= $x; // mul y x
  $z += $y; // add z y

  $w = next($inputs); // inp w
  // echo "$w\n";
  // mul x 0
  $x = $z; // add x z
  $x %= 26; // mod x 26
  // $z = intdiv($z, 1); // div z 1
  $x += 15; // add x 15
  $x = $x === $w ? 0 : 1; // eql x w
  // $x = $x === 0 ? 1 : 0; // eql x 0
  $y = 0; // mul y 0
  $y += 25; // add y 25
  $y *= $x; // mul y x
  $y++; // add y 1
  $z *= $y; // mul z y
  $y = 0; // mul y 0
  $y += $w; // add y w
  $y += 7; // add y 7
  $y *= $x; // mul y x
  $z += $y; // add z y

  $w = next($inputs); // inp w
  // echo "$w\n";
  // mul x 0
  $x = $z; // add x z
  $x %= 26; // mod x 26
  // $z = intdiv($z, 1); // div z 1
  $x += 15; // add x 15
  $x = $x === $w ? 0 : 1; // eql x w
  // $x = $x === 0 ? 1 : 0; // eql x 0
  $y = 0; // mul y 0
  $y += 25; // add y 25
  $y *= $x; // mul y x
  $y++; // add y 1
  $z *= $y; // mul z y
  $y = 0; // mul y 0
  $y += $w; // add y w
  $y++; // add y 10
  $y *= $x; // mul y x
  $z += $y; // add z y

  $w = next($inputs); // inp w
  // echo "$w\n";
  // mul x 0
  $x = $z; // add x z
  $x %= 26; // mod x 26
  // $z = intdiv($z, 1); // div z 1
  $x += 11; ////// add x 11
  $x = $x === $w ? 0 : 1; // eql x w
  // $x = $x === 0 ? 1 : 0; // eql x 0
  $y = 0; // mul y 0
  $y += 25; // add y 25
  $y *= $x; // mul y x
  $y++; // add y 1
  $z *= $y; // mul z y
  $y = 0; // mul y 0
  $y += $w; // add y w
  // add y 2
  $y *= $x; // mul y x
  $z += $y; // add z y

  $w = next($inputs); // inp w
  // echo "$w\n";
  // mul x 0
  $x = $z; // add x z
  $x %= 26; // mod x 26
  $z = intdiv($z, 26); //// div z 26
  $x += -7; ////// add x -7
  $x = $x === $w ? 0 : 1; // eql x w
  // $x = $x === 0 ? 1 : 0; // eql x 0
  $y = 0; // mul y 0
  $y += 25; // add y 25
  $y *= $x; // mul y x
  $y++; // add y 1
  $z *= $y; // mul z y
  $y = 0; // mul y 0
  $y += $w; // add y w
  $y++; // add y 15
  $y *= $x; // mul y x
  $z += $y; // add z y

  $w = next($inputs); // inp w
  // echo "$w\n";
  // mul x 0
  $x = $z; // add x z
  $x %= 26; // mod x 26
  // $z = intdiv($z, 1); // div z 1
  $x += 10; //// add x 10
  $x = $x === $w ? 0 : 1; // eql x w
  // $x = $x === 0 ? 1 : 0; // eql x 0
  $y = 0; // mul y 0
  $y += 25; // add y 25
  $y *= $x; // mul y x
  $y++; // add y 1
  $z *= $y; // mul z y
  $y = 0; // mul y 0
  $y += $w; // add y w
  $y += 8; //// add y 8
  $y *= $x; // mul y x
  $z += $y; // add z y

  $w = next($inputs); // inp w
  // echo "$w\n";
  // mul x 0
  $x = $z; // add x z
  $x %= 26; // mod x 26
  // $z = intdiv($z, 1); // div z 1
  $x += 10; //// add x 10
  $x = $x === $w ? 0 : 1; // eql x w
  // $x = $x === 0 ? 1 : 0; // eql x 0
  $y = 0; // mul y 0
  $y += 25; // add y 25
  $y *= $x; // mul y x
  $y++; // add y 1
  $z *= $y; // mul z y
  $y = 0; // mul y 0
  $y += $w; // add y w
  $y++; // add y 1
  $y *= $x; // mul y x
  $z += $y; // add z y

  $w = next($inputs); // inp w
  // echo "$w\n";
  // mul x 0
  $x = $z; // add x z
  $x %= 26; // mod x 26
  $z = intdiv($z, 26); //// div z 26
  $x += -5; ////// add x -5
  $x = $x === $w ? 0 : 1; // eql x w
  // $x = $x === 0 ? 1 : 0; // eql x 0
  $y = 0; // mul y 0
  $y += 25; // add y 25
  $y *= $x; // mul y x
  $y++; // add y 1
  $z *= $y; // mul z y
  $y = 0; // mul y 0
  $y += $w; // add y w
  $y++; // add y 10
  $y *= $x; // mul y x
  $z += $y; // add z y

  $w = next($inputs); // inp w
  // echo "$w\n";
  // mul x 0
  $x = $z; // add x z
  $x %= 26; // mod x 26
  // $z = intdiv($z, 1); // div z 1
  $x += 15; // add x 15
  $x = $x === $w ? 0 : 1; // eql x w
  // $x = $x === 0 ? 1 : 0; // eql x 0
  $y = 0; // mul y 0
  $y += 25; // add y 25
  $y *= $x; // mul y x
  $y++; // add y 1
  $z *= $y; // mul z y
  $y = 0; // mul y 0
  $y += $w; // add y w
  $y += 5; //// add y 5
  $y *= $x; // mul y x
  $z += $y; // add z y

  $w = next($inputs); // inp w
  // echo "$w\n";
  // mul x 0
  $x = $z; // add x z
  $x %= 26; // mod x 26
  $z = intdiv($z, 26); //// div z 26
  $x += -3; ////// add x -3
  $x = $x === $w ? 0 : 1; // eql x w
  // $x = $x === 0 ? 1 : 0; // eql x 0
  $y = 0; // mul y 0
  $y += 25; // add y 25
  $y *= $x; // mul y x
  $y++; // add y 1
  $z *= $y; // mul z y
  $y = 0; // mul y 0
  $y += $w; // add y w
  $y += 3; ////// add y 3
  $y *= $x; // mul y x
  $z += $y; // add z y

  $w = next($inputs); // inp w
  // echo "$w\n";
  // mul x 0
  $x = $z; // add x z
  $x %= 26; // mod x 26
  $z = intdiv($z, 26); //// div z 26
  $x += 0; ////// add x 0
  $x = $x === $w ? 0 : 1; // eql x w
  // $x = $x === 0 ? 1 : 0; // eql x 0
  $y = 0; // mul y 0
  $y += 25; // add y 25
  $y *= $x; // mul y x
  $y++; // add y 1
  $z *= $y; // mul z y
  $y = 0; // mul y 0
  $y += $w; // add y w
  $y += 5; //// add y 5
  $y *= $x; // mul y x
  $z += $y; // add z y

  $w = next($inputs); // inp w
  // echo "$w\n";
  // mul x 0
  $x = $z; // add x z
  $x %= 26; // mod x 26
  $z = intdiv($z, 26); //// div z 26
  $x += -5; ////// add x -5
  $x = $x === $w ? 0 : 1; // eql x w
  // $x = $x === 0 ? 1 : 0; // eql x 0
  $y = 0; // mul y 0
  $y += 25; // add y 25
  $y *= $x; // mul y x
  $y++; // add y 1
  $z *= $y; // mul z y
  $y = 0; // mul y 0
  $y += $w; // add y w
  $y++; // add y 11
  $y *= $x; // mul y x
  $z += $y; // add z y

  $w = next($inputs); // inp w
  // echo "$w\n";
  // mul x 0
  $x = $z; // add x z
  $x %= 26; // mod x 26
  $z = intdiv($z, 26); //// div z 26
  $x += -9; //// add x -9
  $x = $x === $w ? 0 : 1; // eql x w
  // $x = $x === 0 ? 1 : 0; // eql x 0
  $y = 0; // mul y 0
  $y += 25; // add y 25
  $y *= $x; // mul y x
  $y++; // add y 1
  $z *= $y; // mul z y
  $y = 0; // mul y 0
  $y += $w; // add y w
  $y++; // add y 12
  $y *= $x; // mul y x
  $z += $y; // add z y

  $w = next($inputs); // inp w
  // echo "$w\n";
  // mul x 0
  $x = $z; // add x z
  $x %= 26; // mod x 26
  $z = intdiv($z, 26); //// div z 26
  $x += 0; ////// add x 0
  $x = $x === $w ? 0 : 1; // eql x w
  // $x = $x === 0 ? 1 : 0; // eql x 0
  $y = 0; // mul y 0
  $y += 25; // add y 25
  $y *= $x; // mul y x
  $y++; // add y 1
  $z *= $y; // mul z y
  $y = 0; // mul y 0
  $y += $w; // add y w
  $y++; // add y 10
  $y *= $x; // mul y x
  $z += $y; // add z y

  return $z;
}

function runProgram($program, $inputs) {
  $memory = [
    "w" => 0,
    "x" => 0,
    "y" => 0,
    "z" => 0,
  ];

  $inputPos = 0;

  $pos = 0;
  $maxpos = count($program);

  while (true) {

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

    $paddedVals = array_map(fn($x) => str_pad($x, 12, " ", STR_PAD_LEFT), array_values($memory));
    $line = $program[$pos][0] . " " . $program[$pos][1] . " " . (array_key_exists(2, $program[$pos]) ? $program[$pos][2] : " ");
    echo $program[$pos][0] === "inp" ? "\n" : "";
    echo implode("", $paddedVals) . "           " . $line . "\n";

    $pos++;

    if ($pos >= $maxpos) {
      break;
    }
  }

  return $memory["z"];
}

function solvePart1($program): int {

  $inputs = 99999999999999;
  $loop = 0;
  $start = hrtime(true);

  while (true) {
    $inputs--;
    $txt = "$inputs";
    if (str_contains($txt,"0")) continue;
    if (++$loop % 1000000 === 0) {
      echo "Loop $loop time " . ((hrtime(true) - $start) / 1000000000) . " seconds next up MONAD $txt.\n";
    }
    $result = runDecompiledProgram(str_split($txt));
    if ($result === 0) {
      echo "Found result $inputs!\n";
      return $inputs;
    }
  }

  return -1;
}

function solvePart2($program): int {
  return -1;
}

echo "Solution 1: " . solvePart1($program) . "\n";
echo "Solution 2: " . solvePart2($program) . "\n";
