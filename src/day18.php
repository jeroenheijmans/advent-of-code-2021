<?php

require_once "../vendor/autoload.php";

use Illuminate\Support\Collection;

function collect($value = null)
{
    return new Collection($value);
}

// $input = "3,4,3,1,2";
$input = "
[1,2]
[[1,2],3]
[9,[8,7]]
[[1,9],[8,5]]
[[[[1,2],[3,4]],[[5,6],[7,8]]],9]
[[[9,[3,8]],[[0,9],6]],[[[3,7],[4,9]],3]]
[[[[1,3],[5,3]],[[1,3],[8,7]]],[[[4,9],[6,9]],[[8,2],[7,3]]]]
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

  public function __toString() {
    $result = "";
    if ($this->value !== null) $result .= $this->value;
    else $result .= "[" . $this->left . "," . $this->right . "]";
    return $result;
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

$t = parse("[[[[1,3],[5,3]],[[1,3],[8,7]]],[[[4,9],[6,9]],[[8,2],[7,3]]]]");
echo "$t\n";

function solvePart1($data) {
  return -1;
}

function solvePart2($data) {
  return -1;
}

echo "Solution 1: " . solvePart1($data) . "\n";
echo "Solution 2: " . solvePart2($data) . "\n";
