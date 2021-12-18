<?php

require_once "../vendor/autoload.php";

use Illuminate\Support\Collection;

function collect($value = null)
{
    return new Collection($value);
}

$input = "
[1,1]
[2,2]
[3,3]
[4,4]
[5,5]
[6,6]
";

$data = preg_split("/\r?\n/", trim($input));

class Tree {
  public function __construct(
    public $depth = 0,
    public $parent = null,
    public $left = null,
    public $right = null,
    public $value = null,
  ) {
  }

  public function isValue() { return $this->value !== null; }

  public function isPair() { return $this->left?->isValue() && $this->right?->isValue(); }

  public function explodable() {
    if ($this->isValue()) return false;
    // echo "Considering $this for explosion.  left? " . $this->left->isValue() . " right? " . $this->right->isValue() . " depth: " . $this->depth . "\n";
    return $this->left->isValue() && $this->right->isValue() && $this->depth > 4;
  }

  public function splittable() {
    return $this->isValue() && $this->value >= 10;
  }

  public function split() {
    if (!$this->splittable()) throw new Error("Trying to split unsplittable item");

    $this->left = new Tree($this->depth + 1);
    $this->right = new Tree($this->depth + 1);

    $this->left->value = floor($this->value / 2);
    $this->right->value = ceil($this->value / 2);

    $this->left->parent = $this;
    $this->right->parent = $this;

    $this->value = null;
  }

  public function deepenOne() {
    $this->depth++;
    $this->left?->deepenOne();
    $this->right?->deepenOne();
  }

  public function buildLeavesList() {
    $result = [];
    if ($this->isValue()) {
      array_push($result, $this);
    } else {
      $result = array_merge($result, $this->left?->buildLeavesList());
      $result = array_merge($result, $this->right?->buildLeavesList());
    }
    return $result;
  }

  public function buildPairsList() {
    $result = [];
    if ($this->isPair()) {
      array_push($result, $this);
    } else {
      $result = array_merge($result, $this->left?->buildPairsList() ?? []);
      $result = array_merge($result, $this->right?->buildPairsList() ?? []);
    }
    return $result;
  }

  public function __toString() {
    $result = "";
    if ($this->value !== null) $result .= $this->value;
    else $result .= "[" . $this->left . "," . $this->right . "]";
    return $result . "";
  }
}

function parse($text) {
  $top = new Tree();
  $current = $top;

  foreach (str_split($text) as $char) {

    if ($char === "[") {
      $next = new Tree($current->depth + 1);
      $next->parent = $current;
      if ($current->left === null) $current->left = $next;
      else if ($current->right === null) $current->right = $next;
      else throw new Error("No open slot for $char");
      $current = $next;
    }
    else if ($char === ",") {
      $current = $current->parent;
    }
    else if ($char === "]") {
      $current = $current->parent;
    }
    else if (preg_match("/\d/", $char)) {
      $next = new Tree($current->depth + 1);
      $next->value = intval($char);
      $next->parent = $current;
      if ($current->left === null) $current->left = $next;
      else if ($current->right === null) $current->right = $next;
      else throw new Error("No open slot for $char");
      $current = $next;
    }
    else {
      throw new Error("Unexpected char $char");
    }
  }

  return $top->left;
}

function xpl($tree) {
  $list = $tree->buildPairsList();

  foreach ($list as $toExplode) {
    if ($toExplode->explodable()) {
      $list = $tree->buildLeavesList();
      echo "Exploding: $toExplode\n";
      
      // the pair's left value is added to the first regular number to the left of the exploding pair (if any)
      $idx = array_search($toExplode->left, $list, $strict = true) - 1;
      if (key_exists($idx, $list)) $list[$idx]->value += $toExplode->left->value;

      // the pair's right value is added to the first regular number to the right of the exploding pair (if any)
      $idx = array_search($toExplode->right, $list, $strict = true) + 1;
      if (key_exists($idx, $list)) $list[$idx]->value += $toExplode->right->value;

      // Then, the entire exploding pair is replaced with the regular number 0
      $toExplode->left = null;
      $toExplode->right = null;
      $toExplode->value = 0;

      echo "Tree => $tree\n";
      echo "Depths => " . implode(", ", array_map(fn($x) => $x->depth, $tree->buildPairsList())) . "\n";

      return true; // idiomatic PHP, non? :P
    }
  }

  return false;
}

function splt($tree) {
  $list = $tree->buildLeavesList();

  foreach ($list as $current) {
    if ($current->splittable()) {
      echo "Splitting: $current\n";
      $current->split();
      return true;
    }
  }

  return false;
}

function add($a, $b) {
  $result = new Tree(0);
  $result->left = $a;
  $result->right = $b;
  $result->left->deepenOne();
  $result->right->deepenOne();
  return $result;
}

function reduce($tree) {
  $loop = 0;
  do {
    $reduced = false;
    if (xpl($tree)) {
      $reduced = true;
    }
    else if (splt($tree)) {
      $reduced = true;
    }
    if ($loop++ > 500) throw new Error("More than 500 loops needed");
  } while ($reduced);
}

// Checks for explode
$t = parse("[[[[[9,8],1],2],3],4]");                  $result = xpl($t); if ("$t" !== "[[[[0,9],2],3],4]") throw new Error("$result\n$t should be\n[[[[0,9],2],3],4]\n\n");
$t = parse("[7,[6,[5,[4,[3,2]]]]]");                  $result = xpl($t); if ("$t" !== "[7,[6,[5,[7,0]]]]") throw new Error("$result\n$t should be\n[7,[6,[5,[7,0]]]]\n\n");
$t = parse("[[6,[5,[4,[3,2]]]],1]");                  $result = xpl($t); if ("$t" !== "[[6,[5,[7,0]]],3]") throw new Error("$result\n$t should be\n[[6,[5,[7,0]]],3]\n\n");
$t = parse("[[3,[2,[1,[7,3]]]],[6,[5,[4,[3,2]]]]]");  $result = xpl($t); if ("$t" !== "[[3,[2,[8,0]]],[9,[5,[4,[3,2]]]]]") throw new Error("$result\n$t should be\n[[3,[2,[8,0]]],[9,[5,[4,[3,2]]]]]\n\n");
$t = parse("[[3,[2,[8,0]]],[9,[5,[4,[3,2]]]]]");      $result = xpl($t); if ("$t" !== "[[3,[2,[8,0]]],[9,[5,[7,0]]]]") throw new Error("$result\n$t should be\n[[3,[2,[8,0]]],[9,[5,[7,0]]]]\n\n");

function solvePart1($data) {
  $nrs = array_map(fn($x) => parse($x), $data);
  $current = $nrs[0];
  while ($next = next($nrs)) {
    echo "  $current\n";
    echo "+ $next\n";
    //echo "Depths => " . implode(", ", array_map(fn($x) => $x->depth, $current->buildPairsList())) . "\n";
    $current = add($current, $next);
    echo "> $current\n";
    echo "Depths => " . implode(", ", array_map(fn($x) => $x->depth, $current->buildPairsList())) . "\n";
    reduce($current);
    echo "= $current\n";
    echo "  Depths => " . implode(", ", array_map(fn($x) => $x->depth, $current->buildPairsList())) . "\n";
    echo "\n";
  }
  echo "Final result: $current\n";
}

function solvePart2($data) {
  return -1;
}

echo "Solution 1: " . solvePart1($data) . "\n";
echo "Solution 2: " . solvePart2($data) . "\n";
