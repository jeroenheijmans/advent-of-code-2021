using System;
using System.Linq;

static void RunProgram() {
  long x, output = 0;

  // Digit 01
  x = (output % 26) + 13;
  if (x != input()) output = (output * 26) + (input + 6);

  // Digit 02
  x = (output % 26) + 15;
  if (x != input()) output = (output * 26) + (input + 7);

  // Digit 03
  x = (output % 26) + 15;
  if (x != input()) output = (output * 26) + (input + 10);

  // Digit 04
  x = (output % 26) + 11;
  if (x != input()) output = (output * 26) + (input + 2);

  // Digit 05
  x = (output % 26) + -7;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != input()) output = (output * 26) + (input + 15);

  // Digit 06
  x = (output % 26) + 10;
  if (x != input()) output = (output * 26) + (input + 8);

  // Digit 07
  x = (output % 26) + 10;
  if (x != input()) output = (output * 26) + (input + 1);

  // Digit 08
  x = (output % 26) + -5;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != input()) output = (output * 26) + (input + 10);

  // Digit 09
  x = (output % 26) + 15;
  if (x != input()) output = (output * 26) + (input + 5);

  // Digit 10
  x = (output % 26) + -3;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != input()) output = (output * 26) + (input + 3);

  // Digit 11
  x = (output % 26) + 0;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != input()) output = (output * 26) + (input + 5);

  // Digit 12
  x = (output % 26) + -5;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != input()) output = (output * 26) + (input + 11);

  // Digit 13
  x = (output % 26) + -9;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != input()) output = (output * 26) + (input + 12);

  // Digit 14
  x = (output % 26) + 0;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x != input()) output = (output * 26) + (input + 10);
}

Console.WriteLine("Working!");
RunProgram();
