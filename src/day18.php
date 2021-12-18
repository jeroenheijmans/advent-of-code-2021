<?php

require_once "../vendor/autoload.php";

use Illuminate\Support\Collection;

function collect($value = null)
{
    return new Collection($value);
}

$input = "
[[[[4,0],6],[4,4]],[[6,8],0]]
[[1,[[1,6],0]],[[[8,9],2],[[0,8],[5,5]]]]
[[3,8],7]
[[[8,4],[[4,4],4]],[[3,[0,7]],0]]
[[[[2,0],[4,5]],[7,[2,8]]],5]
[[9,7],[[[8,6],3],[8,[0,2]]]]
[[4,9],[2,[[8,4],2]]]
[9,[[[2,6],[3,2]],[[2,5],[0,0]]]]
[[[9,[8,4]],[7,[1,2]]],[[4,[5,6]],[[5,9],[7,5]]]]
[[[0,[7,5]],[[1,8],1]],[[1,[1,9]],9]]
[[[0,[4,5]],[[1,2],[5,0]]],9]
[[[[7,7],3],1],[[0,[0,7]],[[7,1],[1,9]]]]
[[9,2],[3,[8,[6,1]]]]
[[8,[5,[3,9]]],[1,[3,8]]]
[[1,[[4,4],[4,2]]],4]
[[[5,1],[7,[3,5]]],[[9,[8,4]],9]]
[[5,[0,4]],[[1,[6,5]],9]]
[[[1,0],[4,1]],[[1,[3,2]],2]]
[[[0,[5,9]],[9,[7,2]]],[[4,3],[0,7]]]
[[[[7,9],[0,4]],[[5,6],[0,7]]],[7,[[1,1],[9,5]]]]
[[[[2,6],7],[[8,5],8]],[1,6]]
[[1,[5,5]],[[[3,0],[1,1]],[8,3]]]
[[[[7,4],5],[1,3]],[[6,9],[[3,7],2]]]
[[6,[9,[0,6]]],1]
[8,[4,[2,[2,7]]]]
[[[7,6],[2,8]],[[4,[8,1]],0]]
[4,9]
[[[[6,9],[1,7]],[[4,3],[4,3]]],[[[4,4],[3,6]],[7,[7,0]]]]
[[[7,4],[[9,1],[9,4]]],[6,[[0,4],[4,6]]]]
[[[[3,0],[4,7]],[[8,2],[3,9]]],[4,[0,[5,6]]]]
[[[[1,9],[0,4]],2],[8,[4,[0,9]]]]
[[[[9,6],[3,7]],4],[7,[[0,9],[5,8]]]]
[[5,[[4,0],[0,4]]],[[0,1],[2,[6,0]]]]
[[[2,[9,8]],[[7,9],[6,6]]],[[4,[6,4]],[[2,0],[5,0]]]]
[[[[5,8],8],[[3,1],1]],[[5,7],5]]
[[8,[5,1]],[[[5,5],8],[4,6]]]
[7,[[[3,9],3],[8,6]]]
[[[[8,6],4],8],[[7,[4,0]],[[8,0],4]]]
[[[[7,0],8],[[7,7],1]],[[0,5],[[8,2],5]]]
[4,[3,[3,[6,1]]]]
[[1,[[7,1],[1,2]]],9]
[[[9,[5,7]],[4,[4,7]]],8]
[[[3,[7,2]],[[5,8],6]],[2,0]]
[8,[0,[[7,4],[3,3]]]]
[[[[3,4],[1,1]],3],[[[5,3],0],[[0,7],[6,9]]]]
[3,[[9,1],[3,[0,0]]]]
[[[[8,8],[3,7]],[7,6]],[[[4,7],[9,5]],[5,8]]]
[[[[9,0],[5,6]],[[7,9],5]],0]
[[0,3],[[[9,9],[8,9]],[[7,5],0]]]
[6,[[2,0],3]]
[[[9,3],[[6,9],[8,2]]],[7,[[1,3],[0,5]]]]
[[[[9,5],1],5],[[4,2],[8,[9,5]]]]
[[8,4],[[4,[8,3]],[8,[8,3]]]]
[[[[8,0],[4,4]],[5,2]],[[[0,6],[4,0]],[5,8]]]
[[0,4],[3,[[2,3],7]]]
[[[[6,9],[3,0]],8],[[[4,7],[6,1]],[2,0]]]
[5,[[9,[5,1]],7]]
[[[8,0],[[5,0],0]],[[4,[0,7]],[[6,4],0]]]
[[[1,[0,2]],1],8]
[[[[4,8],[2,0]],[[0,4],9]],[4,[[9,8],[3,8]]]]
[[[1,[6,0]],[6,5]],[3,4]]
[[2,[[4,3],[4,4]]],[[[9,7],8],[5,0]]]
[[[[1,6],2],[[3,5],0]],[[[4,3],[8,1]],[[5,2],[2,1]]]]
[[[[4,8],[1,2]],[9,[3,7]]],[1,[4,4]]]
[[[[2,7],[5,8]],[[2,4],[6,8]]],[9,8]]
[[[1,5],[7,0]],[[8,7],4]]
[[[5,3],[[0,3],[6,2]]],[[8,[7,4]],[5,6]]]
[[[[1,4],1],[8,[2,0]]],[[[0,0],[7,9]],[[1,8],3]]]
[[[[0,0],[4,3]],2],3]
[[[8,[8,9]],[1,[6,1]]],[[6,[5,5]],[5,[9,5]]]]
[[[6,[4,2]],[[1,4],[5,6]]],[0,[[5,9],[2,7]]]]
[3,[[[2,5],2],8]]
[[2,[6,[1,6]]],[0,[4,[9,2]]]]
[[[[7,6],[5,9]],[6,[6,0]]],[2,[3,[1,4]]]]
[[[[1,7],[7,4]],[[6,0],[5,3]]],[2,[[5,2],0]]]
[[[7,[6,1]],[[1,7],[7,2]]],[5,6]]
[[3,2],[6,[9,7]]]
[[[7,[7,5]],[[0,9],5]],[[4,[5,6]],[[8,6],[1,8]]]]
[[[1,[1,6]],7],2]
[[[7,[6,2]],3],[[[5,5],6],9]]
[[[1,[9,8]],[0,5]],[[[2,4],5],[[5,6],7]]]
[[[9,[1,1]],[7,0]],[[5,8],2]]
[[[[8,5],[3,0]],[1,[2,6]]],[[[4,3],[3,2]],0]]
[[[[0,5],7],[7,1]],[4,[[3,4],[9,5]]]]
[[[7,6],[5,1]],[9,3]]
[[[[5,4],6],[2,[0,6]]],[[[6,0],[9,5]],[[8,6],[3,4]]]]
[[0,[6,[9,6]]],[[[1,2],[9,6]],[0,[6,2]]]]
[[[[7,7],6],7],[[8,[0,5]],[0,2]]]
[[[[6,7],[0,7]],[6,[5,0]]],[6,7]]
[[7,[1,8]],[[2,3],[[7,0],3]]]
[[8,[5,7]],[[3,[6,5]],4]]
[[9,9],[[[9,9],9],[2,3]]]
[[[[0,6],[1,4]],5],[1,3]]
[[[9,[8,8]],[[9,9],7]],[2,[[7,1],6]]]
[[[1,8],[1,3]],[[[8,1],8],[[4,2],1]]]
[[4,2],[[[0,7],5],7]]
[[[6,[3,6]],[[0,2],[5,6]]],[[0,1],[[0,9],2]]]
[[[[4,5],[1,4]],1],[[[4,7],[2,3]],6]]
[[[2,2],[0,6]],[[6,[6,4]],1]]
[[[5,[7,7]],[[7,0],1]],2]
";

$data = preg_split("/\r?\n/", trim($input));

class Tree {
  public function __construct(
    public $parent = null,
    public $left = null,
    public $right = null,
    public $value = null,
  ) {
  }

  public function depth() {
    if ($this->parent === null) return 0;
    return $this->parent->depth() + 1;
  }

  public function isValue() { return $this->value !== null; }

  public function isPair() { return $this->left?->isValue() && $this->right?->isValue(); }

  public function explodable() {
    if ($this->isValue()) return false;
    return $this->left->isValue() && $this->right->isValue() && $this->depth() >= 4;
  }

  public function splittable() {
    return $this->isValue() && $this->value >= 10;
  }

  public function split() {
    if (!$this->splittable()) throw new Error("Trying to split unsplittable item");

    $this->left = new Tree();
    $this->right = new Tree();

    $this->left->value = floor($this->value / 2);
    $this->right->value = ceil($this->value / 2);

    $this->left->parent = $this;
    $this->right->parent = $this;

    $this->value = null;
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

  public function magnitude() {
    if ($this->isValue()) return $this->value;
    else return (3 * $this->left->magnitude()) + (2 * $this->right->magnitude());
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
      $next = new Tree();
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
      $next = new Tree();
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
      // echo "Exploding: $toExplode\n";
      
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

      // echo "Tree => $tree\n";
      // echo "Depths => " . implode(", ", array_map(fn($x) => $x->depth(), $tree->buildPairsList())) . "\n";

      return true; // idiomatic PHP, non? :P
    }
  }

  return false;
}

function splt($tree) {
  $list = $tree->buildLeavesList();

  foreach ($list as $current) {
    if ($current->splittable()) {
      // echo "Splitting: $current\n";
      $current->split();
      return true;
    }
  }

  return false;
}

function add($a, $b) {
  $result = new Tree();
  $result->left = $a;
  $result->right = $b;
  $result->left->parent = $result;
  $result->right->parent = $result;
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

// $t = parse("[[[1,1],[2,2]],[3,3]]");
// echo "$t\n";
// echo "  Depths => " . implode(", ", array_map(fn($x) => $x->depth(), $t->buildPairsList())) . "\n";
// return 0;

// Checks for explode
// echo "---- EXPLOSION CHECKS ----\n";
// $t = parse("[[[[[9,8],1],2],3],4]");                  $result = xpl($t); if ("$t" !== "[[[[0,9],2],3],4]") throw new Error("$result\n$t should be\n[[[[0,9],2],3],4]\n\n");
// $t = parse("[7,[6,[5,[4,[3,2]]]]]");                  $result = xpl($t); if ("$t" !== "[7,[6,[5,[7,0]]]]") throw new Error("$result\n$t should be\n[7,[6,[5,[7,0]]]]\n\n");
// $t = parse("[[6,[5,[4,[3,2]]]],1]");                  $result = xpl($t); if ("$t" !== "[[6,[5,[7,0]]],3]") throw new Error("$result\n$t should be\n[[6,[5,[7,0]]],3]\n\n");
// $t = parse("[[3,[2,[1,[7,3]]]],[6,[5,[4,[3,2]]]]]");  $result = xpl($t); if ("$t" !== "[[3,[2,[8,0]]],[9,[5,[4,[3,2]]]]]") throw new Error("$result\n$t should be\n[[3,[2,[8,0]]],[9,[5,[4,[3,2]]]]]\n\n");
// $t = parse("[[3,[2,[8,0]]],[9,[5,[4,[3,2]]]]]");      $result = xpl($t); if ("$t" !== "[[3,[2,[8,0]]],[9,[5,[7,0]]]]") throw new Error("$result\n$t should be\n[[3,[2,[8,0]]],[9,[5,[7,0]]]]\n\n");
// echo "---- EXPLOSION CHECKS ----\n\n";

function solvePart1($data) {
  $nrs = array_map(fn($x) => parse($x), $data);
  $current = $nrs[0];
  while ($next = next($nrs)) {
    // echo "  $current\n";
    // echo "+ $next\n";
    // echo "Depths => " . implode(", ", array_map(fn($x) => $x->depth(), $current->buildPairsList())) . "\n";
    $current = add($current, $next);
    // echo "> $current\n";
    // echo "Depths => " . implode(", ", array_map(fn($x) => $x->depth(), $current->buildPairsList())) . "\n";
    reduce($current);
    // echo "= $current\n";
    // echo "  Depths => " . implode(", ", array_map(fn($x) => $x->depth(), $current->buildPairsList())) . "\n";
    // echo "\n";
  }
  echo "Final result: $current\n";
  return $current->magnitude();
}

function solvePart2($data) {
  return -1;
}

echo "Solution 1: " . solvePart1($data) . "\n";
echo "Solution 2: " . solvePart2($data) . "\n";
