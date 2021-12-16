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

$input = "E20D79005573F71DA0054E48527EF97D3004653BB1FC006867A8B1371AC49C801039171941340066E6B99A6A58B8110088BA008CE6F7893D4E6F7893DCDCFDB9D6CBC4026FE8026200DC7D84B1C00010A89507E3CCEE37B592014D3C01491B6697A83CB4F59E5E7FFA5CC66D4BC6F05D3004E6BB742B004E7E6B3375A46CF91D8C027911797589E17920F4009BE72DA8D2E4523DCEE86A8018C4AD3C7F2D2D02C5B9FF53366E3004658DB0012A963891D168801D08480485B005C0010A883116308002171AA24C679E0394EB898023331E60AB401294D98CA6CD8C01D9B349E0A99363003E655D40289CBDBB2F55D25E53ECAF14D9ABBB4CC726F038C011B0044401987D0BE0C00021B04E2546499DE824C015B004A7755B570013F2DD8627C65C02186F2996E9CCD04E5718C5CBCC016B004A4F61B27B0D9B8633F9344D57B0C1D3805537ADFA21F231C6EC9F3D3089FF7CD25E5941200C96801F191C77091238EE13A704A7CCC802B3B00567F192296259ABD9C400282915B9F6E98879823046C0010C626C966A19351EE27DE86C8E6968F2BE3D2008EE540FC01196989CD9410055725480D60025737BA1547D700727B9A89B444971830070401F8D70BA3B8803F16A3FC2D00043621C3B8A733C8BD880212BCDEE9D34929164D5CB08032594E5E1D25C0055E5B771E966783240220CD19E802E200F4588450BC401A8FB14E0A1805B36F3243B2833247536B70BDC00A60348880C7730039400B402A91009F650028C00E2020918077610021C00C1002D80512601188803B4000C148025010036727EE5AD6B445CC011E00B825E14F4BBF5F97853D2EFD6256F8FFE9F3B001420C01A88915E259002191EE2F4392004323E44A8B4C0069CEF34D304C001AB94379D149BD904507004A6D466B618402477802E200D47383719C0010F8A507A294CC9C90024A967C9995EE2933BA840";

$data = trim($input);

class Packet {
  public function __construct($bits, $pos) {
    // echo "Reading " . substr($bits, 0, $pos) . ">" . substr($bits, $pos) . "\n";

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
      // echo "Literal value: $this->value\n";

    } else { // Operator value
      $this->lengthTypeId = substr($bits, $pos, 1);
      $pos++;
      // echo "Length type ID $this->lengthTypeId\n";

      if ($this->lengthTypeId === "0") { // MODE 15
        $totalLengthInBitsOfSubPackets = bindec(substr($bits, $pos, 15));
        $pos += 15;
        // echo "Mode 15 going to read $totalLengthInBitsOfSubPackets bits\n";
        
        $targetPos = $pos + $totalLengthInBitsOfSubPackets;

        while ($pos < $targetPos) {
          $sub = new Packet($bits, $pos);
          array_push($this->subpackets, $sub);
          $pos = $sub->posAfterParse;
        }
      } else { // MODE 11
        $numberOfSubPackets = bindec(substr($bits, $pos, 11));
        $pos += 11;
        // echo "Mode 11 going to read $numberOfSubPackets packets\n";
        
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
  // echo "Reading $data\n";
  $bits = hexbin($data);
  $topLevelPacket = new Packet($bits, 0);
  // print_r($topLevelPacket);
  return $topLevelPacket->getSummedVersions();
}

function solvePart2($data) {
  return -1;
}

echo "Solution 1: " . solvePart1($data) . "\n";
echo "Solution 2: " . solvePart2($data) . "\n";
