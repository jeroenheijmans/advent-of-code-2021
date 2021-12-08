<?php

$input = "
be cfbegad cbdgef fgaecd cgeb fdcge agebfd fecdb fabcd edb | fdgacbe cefdb cefbgd gcbe
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

function canBeDigit($i, $digit, $mappings) {
  $parts = str_split($digit);
  if ($i === 8) {
    return strlen($digit) === 7;
  }
  if ($i === 7) {
    return strlen($digit) === 3;
  }
  if ($i === 4) {
    return strlen($digit) === 4;
  }
  if ($i === 1) {
    return strlen($digit) === 2;
  }
  if ($i === 0) {
    return
      strlen($digit) === 6 &&
      str_contains($mappings["a"], $parts[0]) &&
      str_contains($mappings["b"], $parts[1]) &&
      str_contains($mappings["c"], $parts[2]) &&
      str_contains($mappings["e"], $parts[3]) &&
      str_contains($mappings["f"], $parts[4]) &&
      str_contains($mappings["g"], $parts[5]) &&
      true;
  }
  if ($i === 6) {
    return
      strlen($digit) === 6 &&
      str_contains($mappings["a"], $parts[0]) &&
      str_contains($mappings["b"], $parts[1]) &&
      str_contains($mappings["d"], $parts[2]) &&
      str_contains($mappings["e"], $parts[3]) &&
      str_contains($mappings["f"], $parts[4]) &&
      str_contains($mappings["g"], $parts[5]) &&
      true;
  }
  if ($i === 9) {
    return
      strlen($digit) === 6 &&
      str_contains($mappings["a"], $parts[0]) &&
      str_contains($mappings["b"], $parts[1]) &&
      str_contains($mappings["c"], $parts[2]) &&
      str_contains($mappings["d"], $parts[3]) &&
      str_contains($mappings["f"], $parts[4]) &&
      str_contains($mappings["g"], $parts[5]) &&
      true;
  }
  if ($i === 2) {
    return
      strlen($digit) === 5 &&
      str_contains($mappings["a"], $parts[0]) &&
      str_contains($mappings["c"], $parts[1]) &&
      str_contains($mappings["d"], $parts[2]) &&
      str_contains($mappings["e"], $parts[3]) &&
      str_contains($mappings["g"], $parts[4]) &&
      true;
  }
  if ($i === 3) {
    return
      strlen($digit) === 5 &&
      str_contains($mappings["a"], $parts[0]) &&
      str_contains($mappings["c"], $parts[1]) &&
      str_contains($mappings["d"], $parts[2]) &&
      str_contains($mappings["f"], $parts[3]) &&
      str_contains($mappings["g"], $parts[4]) &&
      true;
  }
  if ($i === 5) {
    return
      strlen($digit) === 5 &&
      str_contains($mappings["a"], $parts[0]) &&
      str_contains($mappings["b"], $parts[1]) &&
      str_contains($mappings["d"], $parts[2]) &&
      str_contains($mappings["f"], $parts[3]) &&
      str_contains($mappings["g"], $parts[4]) &&
      true;
  }

  return null;
}

function reduceMappings($mappings, $i, $digit) {
  $parts = str_split($digit);
  if ($i === 0) {
    $mappings["a"] = implode(array_intersect(str_split($mappings["a"]), $parts));
    $mappings["b"] = implode(array_intersect(str_split($mappings["b"]), $parts));
    $mappings["c"] = implode(array_intersect(str_split($mappings["c"]), $parts));
    // $mappings["d"] = implode(array_intersect(str_split($mappings["d"]), $parts));
    $mappings["e"] = implode(array_intersect(str_split($mappings["e"]), $parts));
    $mappings["f"] = implode(array_intersect(str_split($mappings["f"]), $parts));
    $mappings["g"] = implode(array_intersect(str_split($mappings["g"]), $parts));
  }
  if ($i === 1) {
    // $mappings["a"] = implode(array_intersect(str_split($mappings["a"]), $parts));
    // $mappings["b"] = implode(array_intersect(str_split($mappings["b"]), $parts));
    $mappings["c"] = implode(array_intersect(str_split($mappings["c"]), $parts));
    // $mappings["d"] = implode(array_intersect(str_split($mappings["d"]), $parts));
    // $mappings["e"] = implode(array_intersect(str_split($mappings["e"]), $parts));
    $mappings["f"] = implode(array_intersect(str_split($mappings["f"]), $parts));
    // $mappings["g"] = implode(array_intersect(str_split($mappings["g"]), $parts));
  }
  if ($i === 3) {
    $mappings["a"] = implode(array_intersect(str_split($mappings["a"]), $parts));
    // $mappings["b"] = implode(array_intersect(str_split($mappings["b"]), $parts));
    $mappings["c"] = implode(array_intersect(str_split($mappings["c"]), $parts));
    $mappings["d"] = implode(array_intersect(str_split($mappings["d"]), $parts));
    $mappings["e"] = implode(array_intersect(str_split($mappings["e"]), $parts));
    // $mappings["f"] = implode(array_intersect(str_split($mappings["f"]), $parts));
    $mappings["g"] = implode(array_intersect(str_split($mappings["g"]), $parts));
  }
  if ($i === 4) {
    // $mappings["a"] = implode(array_intersect(str_split($mappings["a"]), $parts));
    $mappings["b"] = implode(array_intersect(str_split($mappings["b"]), $parts));
    $mappings["c"] = implode(array_intersect(str_split($mappings["c"]), $parts));
    $mappings["d"] = implode(array_intersect(str_split($mappings["d"]), $parts));
    // $mappings["e"] = implode(array_intersect(str_split($mappings["e"]), $parts));
    $mappings["f"] = implode(array_intersect(str_split($mappings["f"]), $parts));
    $mappings["g"] = implode(array_intersect(str_split($mappings["g"]), $parts));
  }
  if ($i === 5) {
    $mappings["a"] = implode(array_intersect(str_split($mappings["a"]), $parts));
    $mappings["b"] = implode(array_intersect(str_split($mappings["b"]), $parts));
    // $mappings["c"] = implode(array_intersect(str_split($mappings["c"]), $parts));
    $mappings["d"] = implode(array_intersect(str_split($mappings["d"]), $parts));
    // $mappings["e"] = implode(array_intersect(str_split($mappings["e"]), $parts));
    $mappings["f"] = implode(array_intersect(str_split($mappings["f"]), $parts));
    $mappings["g"] = implode(array_intersect(str_split($mappings["g"]), $parts));
  }
  if ($i === 6) {
    $mappings["a"] = implode(array_intersect(str_split($mappings["a"]), $parts));
    $mappings["b"] = implode(array_intersect(str_split($mappings["b"]), $parts));
    // $mappings["c"] = implode(array_intersect(str_split($mappings["c"]), $parts));
    $mappings["d"] = implode(array_intersect(str_split($mappings["d"]), $parts));
    $mappings["e"] = implode(array_intersect(str_split($mappings["e"]), $parts));
    $mappings["f"] = implode(array_intersect(str_split($mappings["f"]), $parts));
    $mappings["g"] = implode(array_intersect(str_split($mappings["g"]), $parts));
  }
  
  if ($i === 7) {
    $mappings["a"] = implode(array_intersect(str_split($mappings["a"]), $parts));
    // $mappings["b"] = implode(array_intersect(str_split($mappings["b"]), $parts));
    $mappings["c"] = implode(array_intersect(str_split($mappings["c"]), $parts));
    // $mappings["d"] = implode(array_intersect(str_split($mappings["d"]), $parts));
    // $mappings["e"] = implode(array_intersect(str_split($mappings["e"]), $parts));
    $mappings["f"] = implode(array_intersect(str_split($mappings["f"]), $parts));
    // $mappings["g"] = implode(array_intersect(str_split($mappings["g"]), $parts));
  }
  if ($i === 8) {
    $mappings["a"] = implode(array_intersect(str_split($mappings["a"]), $parts));
    $mappings["b"] = implode(array_intersect(str_split($mappings["b"]), $parts));
    $mappings["c"] = implode(array_intersect(str_split($mappings["c"]), $parts));
    $mappings["d"] = implode(array_intersect(str_split($mappings["d"]), $parts));
    $mappings["e"] = implode(array_intersect(str_split($mappings["e"]), $parts));
    $mappings["f"] = implode(array_intersect(str_split($mappings["f"]), $parts));
    $mappings["g"] = implode(array_intersect(str_split($mappings["g"]), $parts));
  }
  if ($i === 9) {
    $mappings["a"] = implode(array_intersect(str_split($mappings["a"]), $parts));
    $mappings["b"] = implode(array_intersect(str_split($mappings["b"]), $parts));
    $mappings["c"] = implode(array_intersect(str_split($mappings["c"]), $parts));
    $mappings["d"] = implode(array_intersect(str_split($mappings["d"]), $parts));
    // $mappings["e"] = implode(array_intersect(str_split($mappings["e"]), $parts));
    $mappings["f"] = implode(array_intersect(str_split($mappings["f"]), $parts));
    $mappings["g"] = implode(array_intersect(str_split($mappings["g"]), $parts));
  }
  return $mappings;
}

function solvePart2($data) {
  $answer = 0;

  foreach ($data as $row) {
    $mappings = [
      "a" => "abcdefg",
      "b" => "abcdefg",
      "c" => "abcdefg",
      "d" => "abcdefg",
      "e" => "abcdefg",
      "f" => "abcdefg",
      "g" => "abcdefg",
    ];
    $todecode = $row[1];
    $loopstop = 0;

    while ($loopstop++ < 1000 && !empty($todecode)) {
      // Let's limit our options by doing the easy ones:
      foreach ($todecode as $digit) {
        $options = [];
        foreach ([0,1,2,3,4,5,6,7,8,9] as $n) {
          // echo "checking $digit can be $n\n";
          if (canBeDigit($n, $digit, $mappings)) {
            array_push($options, $n);
          }
        }
        echo "$digit can be: " . implode(",", $options) . "\n";
        
        if (count($options) === 1) {
          $mappings = reduceMappings($mappings, $options[0], $digit);
        }
        if (count($options) === 0) {
          print_r($mappings);
          throw new Error("No options left for $digit");
        }
      }
      // print_r($mappings);
      // break;
    }

  }

  return $answer;
}

echo "Solution 1: " . solvePart1($data) . "\n";
echo "Solution 2: " . solvePart2($data) . "\n";
