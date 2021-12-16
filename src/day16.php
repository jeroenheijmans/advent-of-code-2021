<?php

require_once "../vendor/autoload.php";

use Illuminate\Support\Collection;

function collect($value = null)
{
    return new Collection($value);
}

function hexbin($in) { return decbin(hexdec($in)); }

$input = "D2FE28";

$data = trim($input);

function parseValuePacket($bits, $pos) {
  $numberbits = "";

  while (true) {
    $start = substr($bits, $pos, 1);
    $part = substr($bits, $pos + 1, 4);

    $numberbits .= $part;
    if ($start === "0") break;

    $pos += 5;
    if ($pos > strlen($bits)) throw new Error("Parser went beyond end...");
  }

  $number = bindec($numberbits);

  return [
    "value" => $number,
    "newPos" => $pos
  ];
}

function solvePart1($data) {
  $bits = hexbin($data);
  
  $versionBits = substr($bits, 0, 3);
  $typeBits = substr($bits, 3, 3);

  $version = bindec($versionBits);
  $type = bindec($typeBits);

  $pos = 6;

  echo "Reading $data\n";
  echo "Reading $bits\n";
  echo "Version $version type $type\n";

  if ($type === 4) { // Literal value
    $result = parseValuePacket($bits, $pos);
    echo "Literal value: " . $result["value"] . "\n";
    $pos = $result["newPos"];

  } else { // Operator value
    $lengthTypeId = substr($bits, $pos, 1);
    $pos++;
    $length = $lengthTypeId === "0" ? 15 : 11;

    echo "Length type ID $lengthTypeId so length $length\n";
  
    $nr = bindec(substr($bits, $pos, $length));
    $pos += $length;

    for ($n = 0; $n < $nr; $n++) {
      $part = substr($bits, $pos, $length);
      echo "Read sub packet $part\n";

      $pos += $length;
      if ($pos > strlen($bits)) throw new Error("Parser went beyond end...");
    }
  }

  return -1;
}

function solvePart2($data) {
  return -1;
}

echo "Solution 1: " . solvePart1($data) . "\n";
echo "Solution 2: " . solvePart2($data) . "\n";
