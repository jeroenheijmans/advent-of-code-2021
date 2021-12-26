<?php

// From https://stackoverflow.com/a/10520540/419956 by @rdlowrey CC-BY-SA
function errHandle($errNo, $errStr, $errFile, $errLine) {
  $msg = "$errStr in $errFile on line $errLine";
  if ($errNo == E_NOTICE || $errNo == E_WARNING) {
      throw new ErrorException($msg, $errNo);
  } else {
      echo $msg;
  }
}

set_error_handler('errHandle');

ini_set('memory_limit', '2048M');
require_once "../vendor/autoload.php";
use Illuminate\Support\Collection;
function collect($value = null) { return new Collection($value); }

$input = "
--- scanner 0 ---
404,-588,-901
528,-643,409
-838,591,734
390,-675,-793
-537,-823,-458
-485,-357,347
-345,-311,381
-661,-816,-575
-876,649,763
-618,-824,-621
553,345,-567
474,580,667
-447,-329,318
-584,868,-557
544,-627,-890
564,392,-477
455,729,728
-892,524,684
-689,845,-530
423,-701,434
7,-33,-71
630,319,-379
443,580,662
-789,900,-551
459,-707,401

--- scanner 1 ---
686,422,578
605,423,415
515,917,-361
-336,658,858
95,138,22
-476,619,847
-340,-569,-846
567,-361,727
-460,603,-452
669,-402,600
729,430,532
-500,-761,534
-322,571,750
-466,-666,-811
-429,-592,574
-355,545,-477
703,-491,-529
-328,-685,520
413,935,-424
-391,539,-444
586,-435,557
-364,-763,-893
807,-499,-711
755,-354,-619
553,889,-390

--- scanner 2 ---
649,640,665
682,-795,504
-784,533,-524
-644,584,-595
-588,-843,648
-30,6,44
-674,560,763
500,723,-460
609,671,-379
-555,-800,653
-675,-892,-343
697,-426,-610
578,704,681
493,664,-388
-671,-858,530
-667,343,800
571,-461,-707
-138,-166,112
-889,563,-600
646,-828,498
640,759,510
-630,509,768
-681,-892,-333
673,-379,-804
-742,-814,-386
577,-820,562

--- scanner 3 ---
-589,542,597
605,-692,669
-500,565,-823
-660,373,557
-458,-679,-417
-488,449,543
-626,468,-788
338,-750,-386
528,-832,-391
562,-778,733
-938,-730,414
543,643,-506
-524,371,-870
407,773,750
-104,29,83
378,-903,-323
-778,-728,485
426,699,580
-438,-605,-362
-469,-447,-387
509,732,623
647,635,-688
-868,-804,481
614,-800,639
595,780,-596

--- scanner 4 ---
727,592,562
-293,-554,779
441,611,-461
-714,465,-776
-743,427,-804
-660,-479,-426
832,-632,460
927,-485,-438
408,393,-506
466,436,-512
110,16,151
-258,-428,682
-393,719,612
-211,-452,876
808,-476,-593
-575,615,604
-485,667,467
-680,325,-822
-627,-443,-432
872,-547,-609
833,512,582
807,604,487
839,-516,451
891,-625,532
-652,-548,-490
30,-46,-14
";

$data = preg_split("/\r?\n/", trim($input));

$scanner = new Collection();
$scanners = new Collection([]);

foreach ($data as $line) {
  if (empty($line)) {
    continue;
  }
  else if (preg_match("/--- scanner (\d+) ---/", $line, $matches)) {
    $scanner = new Collection();
    $scanners->put(intval($matches[1]), $scanner);
  }
  else if (preg_match("/(-?\d+),(-?\d+),(-?\d+)/", $line, $matches)) {
    $scanner->put($line, new Collection([
      intval($matches[1]),
      intval($matches[2]),
      intval($matches[3]),
      $line,
    ]));
  }
  else {
    throw new Error("Parsing line failed");
  }
}

$data = $scanners;

function solvePart1($scanners) {
  // Step 1: build list of distances
  // For each scanner
  foreach ($scanners as $scannerKey => $scanner) {
    // For each beacon
    foreach ($scanner as $beaconKey => $beacon) {
      // determine distances to each other beacon
      $distances = new Collection();
      $beacon->push($distances);

      foreach ($scanner as $beaconKey2 => $beacon2) {
        // precise distance (manhattan distances overlap too often):
        $distance = round(sqrt(pow($beacon[0] - $beacon2[0], 2) + pow($beacon[1] - $beacon2[1], 2) + pow($beacon[2] - $beacon2[2], 2)), 10);
        $distances->push($distance);
      }
    }
  }

  // We start with all beacons from all scanners at their own in a set:
  $sets = new Collection();
  foreach ($scanners as $skey => $scanner) {
    foreach ($scanner as $beacon) {
      $id = "Scanner::$skey::beacon::" . $beacon[3];
      $sets->push(new Collection([$id]));
    }
  }

  // Step 2: guess/determine overlaps
  // For each scanner COMBI
  // Find overlapping distances with beacons
  foreach ($scanners as $skey1 => $scanner1) {
    foreach ($scanners as $skey2 => $scanner2) {
      if ($skey1 === $skey2) continue;
      
      $overlappingbeacons = [];
      $permutations = $scanner1->crossJoin($scanner2);
      foreach ($permutations as $p) {
        if ($p[0][3] === $p[1][3]) continue;
        $overlaps = $p[0][4]->intersect($p[1][4])->count(); // distinct distances that overlap
        if ($overlaps >= 6) {
          // echo "Scanner $skey1 beacon " . str_pad($p[0][3], 14) . "  -vs-  Scanner $skey2 beacon " . str_pad($p[1][3], 14) . "   => distances to other beacons overlap $overlaps times\n";
          array_push($overlappingbeacons, $p[0][3]);

          $identifier1 = "Scanner::$skey1::beacon::" . $p[0][3];
          $identifier2 = "Scanner::$skey2::beacon::" . $p[1][3];
          
          $set1 = $sets->filter(fn($s) => $s->contains($identifier1))->first();
          $set2 = $sets->filter(fn($s) => $s->contains($identifier2))->first();

          // If these two scanner+beacon combies were not yet together in a set, we now merge their
          // sets because they are apparently all the same
          if ($set1 !== $set2) {
            $sets = $sets->filter(fn($s) => $s !== $set1 && $s !== $set2);
            $newset = $set1->concat($set2)->unique();
            $sets->push($newset);
          }
        }
      }
      // echo "Scanner $skey1 overlapping beacons with $skey2: " . count(array_unique($overlappingbeacons)) . "\n";
    }
    echo "Parsing scanner $skey1\n";
  }

  return $sets;
}

function solvePart2($scanners, $sets) {

  $origins = new Collection([
    0 => ["x" => 0, "y" => 0, "z" => 0],
  ]);
  
  $scannersToDo = $scanners->keys()->filter(fn($k) => $k !== 0);
  $axesPerScanner = [0 => ["x" => 0, "y" => 1, "z" => 2]];
  $dirsPerScanner = [0 => ["x" => +1, "y" => +1, "z" => +1]];

  $loop = 0;

  while (!$scannersToDo->isEmpty()) {
    if ($loop++ > 100) throw new Error("Too many loops, got a bug?");
    // echo "Loop $loop need to do: [" . implode(",", $scannersToDo->toArray()) . "]\n";

    foreach ($origins->keys() as $skeySource) {
      $origin1 = $origins[$skeySource];

      // Find all scanners that have 12x overlap
      $overlapbeacons = $sets
        ->filter(fn($bs) =>
          $bs->contains(fn($b) => str_starts_with($b, "Scanner::$skeySource"))
          && $bs->count() > 1
        )
        ->map(fn($bs) =>
          $bs->map(function($b) {
            preg_match("/Scanner::(\d+)::.*/", $b, $matches);
            return intval($matches[1]);
          })
        )
        ->flatten()
        ->countBy()
        ->filter(fn($count) => $count >= 12)
        ->filter(fn($count, $key) => $key !== $skeySource);

      $skeyTarget = $scannersToDo->intersect($overlapbeacons->keys())->first();

      if ($skeyTarget) {
        break;
      }
    }

    echo "Fixating from source $skeySource to target $skeyTarget\n";

    $axoptions = [
      ["x" => 0, "y" => 1, "z" => 2],
      ["x" => 0, "y" => 2, "z" => 1],
      ["x" => 1, "y" => 0, "z" => 2],
      ["x" => 1, "y" => 2, "z" => 0],
      ["x" => 2, "y" => 0, "z" => 1],
      ["x" => 2, "y" => 1, "z" => 0],
    ];

    $diroptions = [
      ["x" => -1, "y" => -1, "z" => -1],
      ["x" => -1, "y" => -1, "z" => +1],
      ["x" => -1, "y" => +1, "z" => -1],
      ["x" => -1, "y" => +1, "z" => +1],

      ["x" => +1, "y" => -1, "z" => -1],
      ["x" => +1, "y" => -1, "z" => +1],
      ["x" => +1, "y" => +1, "z" => -1],
      ["x" => +1, "y" => +1, "z" => +1],
    ];

    // TODO: 6 axoptions * 8 diroptions = 48 options, 2x too much? what gives?!

    $foundit = false;
    foreach ($axoptions as $ax) {
      if ($foundit) break;
      foreach ($diroptions as $dir) {
        if ($foundit) break;
        $origin2 = null;

        foreach ($sets as $set) {
          $item1 = $set->first(fn($b) => str_starts_with($b, "Scanner::$skeySource"));
          $item2 = $set->first(fn($b) => str_starts_with($b, "Scanner::$skeyTarget"));

          if (!$item1 || !$item2) continue;

          preg_match("/beacon::(.+),(.+),(.+)/", $item1, $matches1);
          preg_match("/beacon::(.+),(.+),(.+)/", $item2, $matches2);

          $beacon1 = [intval($matches1[1]), intval($matches1[2]), intval($matches1[3])];
          $beacon2 = [intval($matches2[1]), intval($matches2[2]), intval($matches2[3])];

          $supposedOrigin = [
            "x" => $origin1["x"] + ($beacon1[$axesPerScanner[$skeySource]["x"]] * $dirsPerScanner[$skeySource]["x"]) + ($beacon2[$ax["x"]] * $dir["x"]),
            "y" => $origin1["y"] + ($beacon1[$axesPerScanner[$skeySource]["y"]] * $dirsPerScanner[$skeySource]["y"]) + ($beacon2[$ax["y"]] * $dir["y"]),
            "z" => $origin1["z"] + ($beacon1[$axesPerScanner[$skeySource]["z"]] * $dirsPerScanner[$skeySource]["z"]) + ($beacon2[$ax["z"]] * $dir["z"]),
          ];

          if ($origin2 === null) {
            $origin2 = $supposedOrigin;
          } else {
            if ($origin2 !== $supposedOrigin) {
              $origin2 = null;
              break;
            }
          }
        }

        if ($origin2 !== null) {
          // echo "Found it!\n";
          // print_r($origin2);
          $origins->put($skeyTarget, $origin2);
          $scannersToDo = $scannersToDo->filter(fn($s) => $s !== $skeyTarget);
          $axesPerScanner[$skeyTarget] = $ax;
          $dirsPerScanner[$skeyTarget] = $dir;
          $foundit = true; // Haha yikes...
        }
      }
    }
  }

  print_r(array_map(fn($x) => implode(",", $x), $axesPerScanner));
  print_r($origins->map(fn($o) => implode(",", $o))->toArray());

  $maxdist = 0;
  foreach ($origins as $a) {
    foreach ($origins as $b) {
      if ($a === $b) continue;
      $dist = abs($a["x"] - $b["x"]) + abs($a["y"] - $b["y"]) + abs($a["z"] - $b["z"]);
      $maxdist = max($maxdist, $dist);
    }
  }

  return $maxdist;
}

$sets = solvePart1($data);
$answer1 = $sets->count();

// print_r($sets->map(fn($x) => $x->toArray())->toArray());

echo "Solution 1: " . $answer1 . "\n";
echo "Solution 2: " . solvePart2($data, $sets) . "\n";
