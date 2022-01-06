using System;
using System.Collections.Generic;
using System.Linq;

static long RunProgram(string digits) {
  long input, x, output = 0;

  input = digits[1-1] - '0'; // Digit 01
  x = (output % 26) + 13;
  if (x != input) output = (output * 26) + (input + 6);

  input = digits[2-1] - '0'; // Digit 02
  x = (output % 26) + 15;
  if (x != input) output = (output * 26) + (input + 7);

  input = digits[3-1] - '0'; // Digit 03
  x = (output % 26) + 15;
  if (x != input) output = (output * 26) + (input + 10);

  input = digits[4-1] - '0'; // Digit 04
  x = (output % 26) + 11;
  if (x != input) output = (output * 26) + (input + 2);

  input = digits[5-1] - '0'; // Digit 05
  x = (output % 26) + -7;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != input) output = (output * 26) + (input + 15);

  input = digits[6-1] - '0'; // Digit 06
  x = (output % 26) + 10;
  if (x != input) output = (output * 26) + (input + 8);

  input = digits[7-1] - '0'; // Digit 07
  x = (output % 26) + 10;
  if (x != input) output = (output * 26) + (input + 1);

  input = digits[8-1] - '0'; // Digit 08
  x = (output % 26) + -5;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != input) output = (output * 26) + (input + 10);

  input = digits[9-1] - '0'; // Digit 09
  x = (output % 26) + 15;
  if (x != input) output = (output * 26) + (input + 5);

  input = digits[10-1] - '0'; // Digit 10
  x = (output % 26) + -3;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != input) output = (output * 26) + (input + 3);

  input = digits[11-1] - '0'; // Digit 11
  x = (output % 26) + 0;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != input) output = (output * 26) + (input + 5);

  input = digits[12-1] - '0'; // Digit 12
  x = (output % 26) + -5;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != input) output = (output * 26) + (input + 11);

  input = digits[13-1] - '0'; // Digit 13
  x = (output % 26) + -9;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != input) output = (output * 26) + (input + 12);

  input = digits[14-1] - '0'; // Digit 14
  x = (output % 26) + 0;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != input) output = (output * 26) + (input + 10);

  return output;
}

Console.WriteLine("Starting day 24 in csharp...");
Console.WriteLine($"13579246899999 gives result {RunProgram("13579246899999")}");
