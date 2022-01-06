using System;
using System.Collections.Generic;
using System.Linq;

static long Run(string digits) {
  if (digits.Length != 14) throw new Exception("Serial not 14 long!");
  long[] inputs = digits.Select(d => (long)(d - '0')).ToArray();
  long x, output = 0;
  
  // Digit 01
  // Digit 02
  // Digit 03
  // Digit 04
  output = (inputs[0] * 17_576) + (inputs[1] * 676) + (inputs[2] * 26) + inputs[3] + 110_450;

  // Digit 05
  x = inputs[3] - 5;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != inputs[4]) output = (output * 26) + (inputs[4] + 15);

  // Digit 06
  output = (output * 26) + (inputs[5] + 8);

  // Digit 07
  output = (output * 26) + (inputs[6] + 1);

  // Digit 08
  x = inputs[6] - 4;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != inputs[7]) output = (output * 26) + (inputs[7] + 10);

  // Digit 09
  output = (output * 26) + (inputs[8] + 5);

  // Digit 10
  x = inputs[8] + 2;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != inputs[9]) output = (output * 26) + (inputs[9] + 3);

  // Digit 11
  x = (output % 26) + 0;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != inputs[10]) output = (output * 26) + (inputs[10] + 5);

  // Digit 12
  x = (output % 26) + -5;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != inputs[11]) output = (output * 26) + (inputs[11] + 11);

  // Digit 13
  x = (output % 26) + -9;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != inputs[12]) output = (output * 26) + (inputs[12] + 12);

  // Digit 14
  x = (output % 26) + 0;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != inputs[13]) output = (output * 26) + (inputs[13] + 10);

  return output;
}

long i = 0;
Console.WriteLine("Starting day 24 in csharp...");
i = 13579246899999; Console.WriteLine($"{i} gives result {Run(i.ToString())}\n");

i = 19894995792792; Console.WriteLine($"{i.ToString()} gives result 1: {Run(i.ToString())}");
i = 29894995792792; Console.WriteLine($"{i.ToString()} gives result 2: {Run(i.ToString())}");
i = 39894995793793; Console.WriteLine($"{i.ToString()} gives result 3: {Run(i.ToString())}");
i = 49894995794794; Console.WriteLine($"{i.ToString()} gives result 4: {Run(i.ToString())}");
i = 59894995795795; Console.WriteLine($"{i.ToString()} gives result 5: {Run(i.ToString())}");
i = 69894995796796; Console.WriteLine($"{i.ToString()} gives result 6: {Run(i.ToString())}");
i = 79894995797797; Console.WriteLine($"{i.ToString()} gives result 7: {Run(i.ToString())}");
i = 89894995798798; Console.WriteLine($"{i.ToString()} gives result 8: {Run(i.ToString())}");
i = 99894995799799; Console.WriteLine($"{i.ToString()} gives result 9: {Run(i.ToString())}");
