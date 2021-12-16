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

$input = "38006F45291200";

$data = trim($input);

class Packet {
  public function __construct($bits, $pos) {
    echo "Reading " . substr($bits, 0, $pos) . ">" . substr($bits, $pos) . "\n";

    $this->subpackets = [];
    $this->value = 0;
    $this->bits = $bits;
    
    $versionBits = substr($bits, $pos, 3);
    $this->version = bindec($versionBits);

    $pos += 3;

    $typeBits = substr($bits, $pos, 3);
    $this->type = bindec($typeBits);

    $pos += 3;

    echo "Version ($versionBits) $this->version. Type ($typeBits) $this->type\n";

    if ($this->type === 4) { // Literal value
      
      $numberbits = "";

      while (true) {
        $start = substr($bits, $pos, 1);
        $part = substr($bits, $pos + 1, 4);

        $numberbits .= $part;
        $pos += 5;
        if ($start === "0") break;
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
        echo "Mode 15 going to read $totalLengthInBitsOfSubPackets bits\n";
        
        // TODO
        throw new Error("Mode 15 not ipmlemented yet");
      } else { // MODE 11
        $numberOfSubPackets = bindec(substr($bits, $pos, 11));
        $pos += 11;
        echo "Mode 11 going to read $numberOfSubPackets packets\n";
        
        for ($n = 0; $n < $numberOfSubPackets; $n++) {
          $sub = new Packet($bits, $pos);
          array_push($this->subpackets, $sub);
          $pos = $sub->posAfterParse;
        }
      }
    }

    $this->posAfterParse = $pos;
  }

  public function getSummedVersions() {
    return $this->version + array_sum(array_map(fn($p) => $p->getSummedVersions(), $this->subpackets));
  }
}

function solvePart1($data) {
  echo "Reading $data\n";
  $bits = hexbin($data);
  $topLevelPacket = new Packet($bits, 0);
  print_r($topLevelPacket);
  return $topLevelPacket->getSummedVersions();
}

function solvePart2($data) {
  return -1;
}

echo "Solution 1: " . solvePart1($data) . "\n";
echo "Solution 2: " . solvePart2($data) . "\n";
