<?php

$input = "
acedgfb cdfbe gcdfa fbcad dab cefabd cdfgeb eafb cagedb ab | cdfeb fcadb cdfeb cdbaf
";

$data = array_map(
  fn ($x) => array_map(
    fn ($part) => explode(" ", $part),
    explode(" | ", $x),
  ),
  preg_split("/\r?\n/", trim($input)),
);

function solvePart1($data) {
  $answer = 0;

  foreach ($data as $row) {
    foreach ($row[1] as $digit) {
      if (in_array(strlen($digit), [2, 4, 3, 7])) {
        $answer++;
      }
    }
  }

  return $answer;
}

function sortedchars($text) {
  $result = str_split($text);
  sort($result);
  return $result;
}

function solvePart2($data) {
  $answer = 0;

  foreach ($data as $row) {
    $mappings = [
      "a" => str_split("abcdefg"),
      "b" => str_split("abcdefg"),
      "c" => str_split("abcdefg"),
      "d" => str_split("abcdefg"),
      "e" => str_split("abcdefg"),
      "f" => str_split("abcdefg"),
      "g" => str_split("abcdefg"),
    ];
    
    $signals = 
      array_map(
        fn ($x) => sortedchars($x),
        array_unique(
          array_merge($row[0], $row[1])
        ),
    );

    $theSeven = current(array_filter($signals, fn ($s) => count($s) === 3));
    
    $loopstop = 0;

    while ($loopstop++ < 1) {
      foreach ($signals as $signal) {

        if (count($signal) === 2) {
          $mappings["a"] = array_diff($mappings["a"], $signal);
          $mappings["b"] = array_diff($mappings["b"], $signal);
          $mappings["c"] = array_intersect($mappings["c"], $signal);
          $mappings["d"] = array_diff($mappings["d"], $signal);
          $mappings["e"] = array_diff($mappings["e"], $signal);
          $mappings["f"] = array_intersect($mappings["f"], $signal);
          $mappings["g"] = array_diff($mappings["g"], $signal);
        }

        if (count($signal) === 3) {
          $mappings["a"] = array_intersect($mappings["a"], $signal);
          $mappings["b"] = array_diff($mappings["b"], $signal);
          $mappings["c"] = array_intersect($mappings["c"], $signal);
          $mappings["d"] = array_diff($mappings["d"], $signal);
          $mappings["e"] = array_diff($mappings["e"], $signal);
          $mappings["f"] = array_intersect($mappings["f"], $signal);
          $mappings["g"] = array_diff($mappings["g"], $signal);
        }

        if (count($signal) === 4) {
          $mappings["a"] = array_diff($mappings["a"], $signal);
          $mappings["b"] = array_intersect($mappings["b"], $signal);
          $mappings["c"] = array_intersect($mappings["c"], $signal);
          $mappings["d"] = array_intersect($mappings["d"], $signal);
          $mappings["e"] = array_diff($mappings["e"], $signal);
          $mappings["f"] = array_intersect($mappings["f"], $signal);
          $mappings["g"] = array_diff($mappings["g"], $signal);
        }

        if (count($signal) === 5) {
          // Look for the 3, which overlaps with 7 completely
          if (count(array_intersect($theSeven, $signal)) === 3) {
            $d_and_g = array_diff($signal, $theSeven);
            $mappings["d"] = array_intersect($mappings["d"], $d_and_g);
            $mappings["g"] = array_intersect($mappings["g"], $d_and_g);
          }
        }

        foreach ($mappings as $key => $value) {
          if (count($value) === 1) {
            if ($key !== "a") $mappings["a"] = array_diff($mappings["a"], $value);
            if ($key !== "b") $mappings["b"] = array_diff($mappings["b"], $value);
            if ($key !== "c") $mappings["c"] = array_diff($mappings["c"], $value);
            if ($key !== "d") $mappings["d"] = array_diff($mappings["d"], $value);
            if ($key !== "e") $mappings["e"] = array_diff($mappings["e"], $value);
            if ($key !== "f") $mappings["f"] = array_diff($mappings["f"], $value);
            if ($key !== "g") $mappings["g"] = array_diff($mappings["g"], $value);
          }
        }

      }
    }
    print_r($mappings);

  }

  return $answer;
}

echo "Solution 1: " . solvePart1($data) . "\n";
echo "Solution 2: " . solvePart2($data) . "\n";
