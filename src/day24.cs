using System;
using System.Linq;

static void RunProgram() {
  long w, x, y, z;

  // Digit 01
  w = nextDigit();
  x = (z % 26) + 13;
  x = x == w ? 0 : 1;
  z = (z * ((25 * x) + 1)) + ((w + 6) * x);

  // Digit 02
  w = nextDigit();
  x = (z % 26) + 15;
  x = x == w ? 0 : 1;
  z = (z * ((25 * x) + 1)) + ((w + 7) * x);

  // Digit 03
  w = nextDigit();
  x = (z % 26) + 15;
  x = x == w ? 0 : 1;
  z = (z * ((25 * x) + 1)) + ((w + 10) * x);

  // Digit 04
  w = nextDigit();
  x = (z % 26) + 11;
  x = x == w ? 0 : 1;
  z = (z * ((25 * x) + 1)) + ((w + 2) * x);

  // Digit 05
  w = nextDigit();
  x = (z % 26) + -7;
  z = z / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  x = x == w ? 0 : 1;
  z = (z * ((25 * x) + 1)) + ((w + 15) * x);

  // Digit 06
  w = nextDigit();
  x = (z % 26) + 10;
  x = x == w ? 0 : 1;
  z = (z * ((25 * x) + 1)) + ((w + 8) * x);

  // Digit 07
  w = nextDigit();
  x = (z % 26) + 10;
  x = x == w ? 0 : 1;
  z = (z * ((25 * x) + 1)) + ((w + 1) * x);

  // Digit 08
  w = nextDigit();
  x = (z % 26) + -5;
  z = z / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  x = x == w ? 0 : 1;
  z = (z * ((25 * x) + 1)) + ((w + 10) * x);

  // Digit 09
  w = nextDigit();
  x = (z % 26) + 15;
  x = x == w ? 0 : 1;
  z = (z * ((25 * x) + 1)) + ((w + 5) * x);

  // Digit 10
  w = nextDigit();
  x = (z % 26) + -3;
  z = z / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  x = x == w ? 0 : 1;
  z = (z * ((25 * x) + 1)) + ((w + 3) * x);

  // Digit 11
  w = nextDigit();
  x = (z % 26) + 0;
  z = z / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  x = x == w ? 0 : 1;
  z = (z * ((25 * x) + 1)) + ((w + 5) * x);

  // Digit 12
  w = nextDigit();
  x = (z % 26) + -5;
  z = z / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  x = x == w ? 0 : 1;
  z = (z * ((25 * x) + 1)) + ((w + 11) * x);

  // Digit 13
  w = nextDigit();
  x = (z % 26) + -9;
  z = z / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  x = x == w ? 0 : 1;
  z = (z * ((25 * x) + 1)) + ((w + 12) * x);

  // Digit 14
  w = nextDigit();
  x = (z % 26) + 0;
  z = z / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  x = x == w ? 0 : 1;
  z = (z * ((25 * x) + 1)) + ((w + 10) * x);
}

Console.WriteLine("Working!");
RunProgram();
