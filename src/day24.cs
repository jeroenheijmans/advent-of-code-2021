using System;
using System.Collections.Generic;
using System.Linq;

static long RunProgram(string digits) {
  long[] inputs = digits.Select(d => (long)(d - '0')).ToArray();
  long i = -1, x, output = 0;

  // Digit 01
  x = (output % 26) + 13;
  if (x != inputs[++i]) output = (output * 26) + (inputs[i] + 6);

  // Digit 02
  x = (output % 26) + 15;
  if (x != inputs[++i]) output = (output * 26) + (inputs[i] + 7);

  // Digit 03
  x = (output % 26) + 15;
  if (x != inputs[++i]) output = (output * 26) + (inputs[i] + 10);

  // Digit 04
  x = (output % 26) + 11;
  if (x != inputs[++i]) output = (output * 26) + (inputs[i] + 2);

  // Digit 05
  x = (output % 26) + -7;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != inputs[++i]) output = (output * 26) + (inputs[i] + 15);

  // Digit 06
  x = (output % 26) + 10;
  if (x != inputs[++i]) output = (output * 26) + (inputs[i] + 8);

  // Digit 07
  x = (output % 26) + 10;
  if (x != inputs[++i]) output = (output * 26) + (inputs[i] + 1);

  // Digit 08
  x = (output % 26) + -5;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != inputs[++i]) output = (output * 26) + (inputs[i] + 10);

  // Digit 09
  x = (output % 26) + 15;
  if (x != inputs[++i]) output = (output * 26) + (inputs[i] + 5);

  // Digit 10
  x = (output % 26) + -3;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != inputs[++i]) output = (output * 26) + (inputs[i] + 3);

  // Digit 11
  x = (output % 26) + 0;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != inputs[++i]) output = (output * 26) + (inputs[i] + 5);

  // Digit 12
  x = (output % 26) + -5;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != inputs[++i]) output = (output * 26) + (inputs[i] + 11);

  // Digit 13
  x = (output % 26) + -9;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != inputs[++i]) output = (output * 26) + (inputs[i] + 12);

  // Digit 14
  x = (output % 26) + 0;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != inputs[++i]) output = (output * 26) + (inputs[i] + 10);

  return output;
}

Console.WriteLine("Starting day 24 in csharp...");
Console.WriteLine($"13579246899999 gives result {RunProgram("13579246899999")}");
