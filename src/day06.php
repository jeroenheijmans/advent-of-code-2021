<?php

// $input = "3,4,3,1,2";
$input = "3,5,1,5,3,2,1,3,4,2,5,1,3,3,2,5,1,3,1,5,5,1,1,1,2,4,1,4,5,2,1,2,4,3,1,2,3,4,3,4,4,5,1,1,1,1,5,5,3,4,4,4,5,3,4,1,4,3,3,2,1,1,3,3,3,2,1,3,5,2,3,4,2,5,4,5,4,4,2,2,3,3,3,3,5,4,2,3,1,2,1,1,2,2,5,1,1,4,1,5,3,2,1,4,1,5,1,4,5,2,1,1,1,4,5,4,2,4,5,4,2,4,4,1,1,2,2,1,1,2,3,3,2,5,2,1,1,2,1,1,1,3,2,3,1,5,4,5,3,3,2,1,1,1,3,5,1,1,4,4,5,4,3,3,3,3,2,4,5,2,1,1,1,4,2,4,2,2,5,5,5,4,1,1,5,1,5,2,1,3,3,2,5,2,1,2,4,3,3,1,5,4,1,1,1,4,2,5,5,4,4,3,4,3,1,5,5,2,5,4,2,3,4,1,1,4,4,3,4,1,3,4,1,1,4,3,2,2,5,3,1,4,4,4,1,3,4,3,1,5,3,3,5,5,4,4,1,2,4,2,2,3,1,1,4,5,3,1,1,1,1,3,5,4,1,1,2,1,1,2,1,2,3,1,1,3,2,2,5,5,1,5,5,1,4,4,3,5,4,4";

$data = array_map('intval', explode(",", trim($input)));

function solvePart1($data) {
  for ($i = 0; $i < 80; $i++) {
    $newdata = [];

    // echo implode(",", $data) . "\n";

    for ($x = 0; $x < count($data); $x++) {
      $fish = $data[$x] - 1;
      
      if ($fish < 0) {
        array_push($newdata, 6, 8);
      } else {
        array_push($newdata, $fish);
      }
    }
    $data = $newdata;
  }
  return count($data);
}

function solvePart2($data) {
  $lifetimes = Array(
    0 => 0,
    1 => 0,
    2 => 0,
    3 => 0,
    4 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
    8 => 0,
  );

  for ($x = 0; $x < count($data); $x++) {
    $lifetimes[$data[$x]]++;
  }

  for ($i = 0; $i < 256; $i++) {
    // echo "Day $i\n";
    // print_r($lifetimes);

    $newdata = Array(
      0 => 0,
      1 => 0,
      2 => 0,
      3 => 0,
      4 => 0,
      5 => 0,
      6 => 0,
      7 => 0,
      8 => 0,
    );

    for ($d = 0; $d < 9; $d++) {
      $fish = $lifetimes[$d];

      if ($d === 0) {
        $newdata[6] = $fish;
        $newdata[8] = $fish;
      } else {
        $newdata[$d - 1] += $fish;
      }
    }

    $lifetimes = $newdata;
  }

  return array_sum(array_values($lifetimes));
}

echo "Solution 1: " . solvePart1($data) . "\n";
echo "Solution 2: " . solvePart2($data) . "\n";
