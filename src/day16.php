<?php

require_once "../vendor/autoload.php";

use Illuminate\Support\Collection;

function collect($value = null)
{
    return new Collection($value);
}

function hexbin($in) {
  // TODO: Find out why this doesn't work?
  // return decbin(hexdec($in));
  $result = "";
  foreach (str_split($in) as $item) {
    if ($item === "0") $result .= "0000";
    if ($item === "1") $result .= "0001";
    if ($item === "2") $result .= "0010";
    if ($item === "3") $result .= "0011";
    if ($item === "4") $result .= "0100";
    if ($item === "5") $result .= "0101";
    if ($item === "6") $result .= "0110";
    if ($item === "7") $result .= "0111";
    if ($item === "8") $result .= "1000";
    if ($item === "9") $result .= "1001";
    if ($item === "A") $result .= "1010";
    if ($item === "B") $result .= "1011";
    if ($item === "C") $result .= "1100";
    if ($item === "D") $result .= "1101";
    if ($item === "E") $result .= "1110";
    if ($item === "F") $result .= "1111";
  }
  return $result;
}

$input = "EE00D40C823060";

$data = trim($input);

class Packet {
  public function __construct($bits) {
    $this->subpackets = [];
    $this->value = 0;
    $this->bits = $bits;
    
    $versionBits = substr($bits, 0, 3);
    $typeBits = substr($bits, 3, 3);

    $this->version = bindec($versionBits);
    $this->type = bindec($typeBits);

    $pos = 6;

    echo "Reading $bits\n";
    echo "Version $this->version type $this->type\n";

    if ($this->type === 4) { // Literal value
      
      $numberbits = "";

      while (true) {
        $start = substr($bits, $pos, 1);
        $part = substr($bits, $pos + 1, 4);

        $numberbits .= $part;
        if ($start === "0") break;

        $pos += 5;
        if ($pos > strlen($bits)) throw new Error("Parser went beyond end...");
      }

      $this->value = bindec($numberbits);
      echo "Literal value: $this->value\n";

    } else { // Operator value
      $this->lengthTypeId = substr($bits, $pos, 1);
      $pos++;
      echo "Length type ID $this->lengthTypeId\n";

      if ($this->lengthTypeId === "0") { // MODE 15
        $totalLengthInBitsOfSubPackets = bindec(substr($bits, $pos, 15));
        $pos += 15;
        // todo?
        throw new Error("Mode 15 not implemented yet");

      } else { // MODE 11
        $numberOfSubPackets = bindec(substr($bits, $pos, 11));
        $pos += 11;
        
        for ($n = 0; $n < $numberOfSubPackets; $n++) {
          $rest = substr($bits, $pos);
          $sub = new Packet($rest);
          array_push($this->subpackets, $sub);
          $bits = $sub->rest;
        }
      }
    }

    $this->rest = substr($bits, $pos);
  }

  public function getSummedVersions() {
    return $this->version + array_sum(array_map(fn($p) => $p->getSummedVersions(), $this->subpackets));
  }
}

function solvePart1($data) {
  echo "Reading $data\n";
  $bits = hexbin($data);
  $topLevelPacket = new Packet($bits);
  print_r($topLevelPacket);
  return $topLevelPacket->getSummedVersions();
}

function solvePart2($data) {
  return -1;
}

echo "Solution 1: " . solvePart1($data) . "\n";
echo "Solution 2: " . solvePart2($data) . "\n";
