using System;
using System.Collections.Generic;
using System.Linq;

static long Run(string digits) {
  if (digits.Length != 14) throw new Exception("Serial not 14 long!");
  long[] inputs = digits.Select(d => (long)(d - '0')).ToArray();
  long x, output = 0;
  
  // Digit 01
  x = (output % 26) + 13;
  if (x != inputs[0]) output = (output * 26) + (inputs[0] + 6);

  // Digit 02
  x = (output % 26) + 15;
  if (x != inputs[1]) output = (output * 26) + (inputs[1] + 7);

  // Digit 03
  x = (output % 26) + 15;
  if (x != inputs[2]) output = (output * 26) + (inputs[2] + 10);

  // Digit 04
  x = (output % 26) + 11;
  if (x != inputs[3]) output = (output * 26) + (inputs[3] + 2);

  // Digit 05
  x = (output % 26) + -7;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != inputs[4]) output = (output * 26) + (inputs[4] + 15);

  // Digit 06
  x = (output % 26) + 10;
  if (x != inputs[5]) output = (output * 26) + (inputs[5] + 8);

  // Digit 07
  x = (output % 26) + 10;
  if (x != inputs[6]) output = (output * 26) + (inputs[6] + 1);

  // Digit 08
  x = (output % 26) + -5;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != inputs[7]) output = (output * 26) + (inputs[7] + 10);

  // Digit 09
  x = (output % 26) + 15;
  if (x != inputs[8]) output = (output * 26) + (inputs[8] + 5);

  // Digit 10
  x = (output % 26) + -3;
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

i = 12161195799799; Console.WriteLine($"{i.ToString()} gives result 1: {Run(i.ToString())}");
i = 12261195799799; Console.WriteLine($"{i.ToString()} gives result 2: {Run(i.ToString())}");
i = 12361195799799; Console.WriteLine($"{i.ToString()} gives result 3: {Run(i.ToString())}");
i = 12461195799799; Console.WriteLine($"{i.ToString()} gives result 4: {Run(i.ToString())}");
i = 12561195799799; Console.WriteLine($"{i.ToString()} gives result 5: {Run(i.ToString())}");
i = 12661195799799; Console.WriteLine($"{i.ToString()} gives result 6: {Run(i.ToString())}");
i = 12761195799799; Console.WriteLine($"{i.ToString()} gives result 7: {Run(i.ToString())}");
i = 12861195799799; Console.WriteLine($"{i.ToString()} gives result 8: {Run(i.ToString())}");
i = 12961195799799; Console.WriteLine($"{i.ToString()} gives result 9: {Run(i.ToString())}");

long c = 0;
i = 13579246899999; // start from the example and go up to see if we get lucky
while (true) {
  i += 100000;
  var result = Run(i.ToString());
  if (result == 0) {
    Console.WriteLine($"Result {result} for {i}");
    throw new Exception("Done!");
  }
  if (c++ % 100_000 == 0) Console.WriteLine($"At {i}");
}