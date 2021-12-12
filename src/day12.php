<?php

require_once "../vendor/autoload.php";

use Illuminate\Support\Collection;

function collect($value = null)
{
    return new Collection($value);
}

$input = "
ma-start
YZ-rv
MP-rv
vc-MP
QD-kj
rv-kj
ma-rv
YZ-zd
UB-rv
MP-xe
start-MP
zd-end
ma-UB
ma-MP
UB-xe
end-UB
ju-MP
ma-xe
zd-UB
start-xe
YZ-end
";

$data = preg_split("/\r?\n/", trim($input));

$caves = [];

foreach ($data as $line) {
  $source = explode("-", $line)[0];
  $target = explode("-", $line)[1];

  if (!array_key_exists($source, $caves)) $caves[$source] = [];
  if (!array_key_exists($target, $caves)) $caves[$target] = [];

  if (!in_array($target, $caves[$source])) array_push($caves[$source], $target);
  if (!in_array($source, $caves[$target])) array_push($caves[$target], $source);
}

// print_r($caves);

function solvePart1($caves) {
  $answer = 0;

  $loop = 0;

  $paths = [ ["start"] ];

  while (true) {
    $openPaths = [];
    $finishedPaths = [];

    foreach ($paths as $path) {
      $place = end($path);

      if ($place === "end") {
        array_push($finishedPaths, $path);
        continue;
      }
      
      foreach ($caves[$place] as $target) {
        if (ctype_lower($target) && in_array($target, $path)) continue;

        $option = $path; // copy current path
        array_push($option, $target); // add target to end
        array_push($openPaths, $option); // save new path
      }
    }

    if (empty($openPaths)) break;
    if ($loop++ > 100) { throw new Error("Don't want to hang my solution..."); }

    $paths = array_merge($finishedPaths, $openPaths);
  }

  $paths = array_filter($paths, fn($path) => end($path) === "end");

  print_r($paths);

  return count($paths);
}

function solvePart2($caves) {

  $answer = 0;
  return $answer;
}

echo "Solution 1: " . solvePart1($caves) . "\n";
echo "Solution 2: " . solvePart2($caves) . "\n";
