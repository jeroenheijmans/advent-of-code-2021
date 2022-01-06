using System;
using System.Linq;

static void RunProgram() {
  long input, x, y, output;

  input = nextDigit(); // Digit 01
  x = (output % 26) + 13;
  if (x != input) output = (output * 26) + (input + 6);

  input = nextDigit(); // Digit 02
  x = (output % 26) + 15;
  if (x != input) output = (output * 26) + (input + 7);

  input = nextDigit(); // Digit 03
  x = (output % 26) + 15;
  if (x != input) output = (output * 26) + (input + 10);

  input = nextDigit(); // Digit 04
  x = (output % 26) + 11;
  if (x != input) output = (output * 26) + (input + 2);

  input = nextDigit(); // Digit 05
  x = (output % 26) + -7;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != input) output = (output * 26) + (input + 15);

  input = nextDigit(); // Digit 06
  x = (output % 26) + 10;
  if (x != input) output = (output * 26) + (input + 8);

  input = nextDigit(); // Digit 07
  x = (output % 26) + 10;
  if (x != input) output = (output * 26) + (input + 1);

  input = nextDigit(); // Digit 08
  x = (output % 26) + -5;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != input) output = (output * 26) + (input + 10);

  input = nextDigit(); // Digit 09
  x = (output % 26) + 15;
  if (x != input) output = (output * 26) + (input + 5);

  input = nextDigit(); // Digit 10
  x = (output % 26) + -3;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != input) output = (output * 26) + (input + 3);

  input = nextDigit(); // Digit 11
  x = (output % 26) + 0;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != input) output = (output * 26) + (input + 5);

  input = nextDigit(); // Digit 12
  x = (output % 26) + -5;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != input) output = (output * 26) + (input + 11);

  input = nextDigit(); // Digit 13
  x = (output % 26) + -9;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != input) output = (output * 26) + (input + 12);

  input = nextDigit(); // Digit 14
  x = (output % 26) + 0;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != input) output = (output * 26) + (input + 10);
}

Console.WriteLine("Working!");
RunProgram();
