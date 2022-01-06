using System;
using System.Linq;

static void RunProgram() {
  long input, x, y, output;

  // Digit 01
  input = nextDigit();
  x = (output % 26) + 13;
  if (x == input) {
    x = 0;
    output = (output * ((25 * x) + 1)) + ((input + 6) * x);
  } else {
    x = 1;
    output = (output * ((25 * x) + 1)) + ((input + 6) * x);
  }

  // Digit 02
  input = nextDigit();
  x = (output % 26) + 15;
  if (x == input) {
    x = 0;
    output = (output * ((25 * x) + 1)) + ((input + 7) * x);
  } else {
    x = 1;
    output = (output * ((25 * x) + 1)) + ((input + 7) * x);
  }

  // Digit 03
  input = nextDigit();
  x = (output % 26) + 15;
  if (x == input) {
    x = 0;
    output = (output * ((25 * x) + 1)) + ((input + 10) * x);
  } else {
    x = 1;
    output = (output * ((25 * x) + 1)) + ((input + 10) * x);
  }

  // Digit 04
  input = nextDigit();
  x = (output % 26) + 11;
  if (x == input) {
    x = 0;
    output = (output * ((25 * x) + 1)) + ((input + 2) * x);
  } else {
    x = 1;
    output = (output * ((25 * x) + 1)) + ((input + 2) * x);
  }

  // Digit 05
  input = nextDigit();
  x = (output % 26) + -7;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x == input) {
    x = 0;
    output = (output * ((25 * x) + 1)) + ((input + 15) * x);
  } else {
    x = 1;
    output = (output * ((25 * x) + 1)) + ((input + 15) * x);
  }

  // Digit 06
  input = nextDigit();
  x = (output % 26) + 10;
  if (x == input) {
    x = 0;
    output = (output * ((25 * x) + 1)) + ((input + 8) * x);
  } else {
    x = 1;
    output = (output * ((25 * x) + 1)) + ((input + 8) * x);
  }

  // Digit 07
  input = nextDigit();
  x = (output % 26) + 10;
  if (x == input) {
    x = 0;
    output = (output * ((25 * x) + 1)) + ((input + 1) * x);
  } else {
    x = 1;
    output = (output * ((25 * x) + 1)) + ((input + 1) * x);
  }

  // Digit 08
  input = nextDigit();
  x = (output % 26) + -5;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x == input) {
    x = 0;
    output = (output * ((25 * x) + 1)) + ((input + 10) * x);
  } else {
    x = 1;
    output = (output * ((25 * x) + 1)) + ((input + 10) * x);
  }

  // Digit 09
  input = nextDigit();
  x = (output % 26) + 15;
  if (x == input) {
    x = 0;
    output = (output * ((25 * x) + 1)) + ((input + 5) * x);
  } else {
    x = 1;
    output = (output * ((25 * x) + 1)) + ((input + 5) * x);
  }

  // Digit 10
  input = nextDigit();
  x = (output % 26) + -3;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x == input) {
    x = 0;
    output = (output * ((25 * x) + 1)) + ((input + 3) * x);
  } else {
    x = 1;
    output = (output * ((25 * x) + 1)) + ((input + 3) * x);
  }

  // Digit 11
  input = nextDigit();
  x = (output % 26) + 0;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x == input) {
    x = 0;
    output = (output * ((25 * x) + 1)) + ((input + 5) * x);
  } else {
    x = 1;
    output = (output * ((25 * x) + 1)) + ((input + 5) * x);
  }

  // Digit 12
  input = nextDigit();
  x = (output % 26) + -5;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x == input) {
    x = 0;
    output = (output * ((25 * x) + 1)) + ((input + 11) * x);
  } else {
    x = 1;
    output = (output * ((25 * x) + 1)) + ((input + 11) * x);
  }

  // Digit 13
  input = nextDigit();
  x = (output % 26) + -9;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x == input) {
    x = 0;
    output = (output * ((25 * x) + 1)) + ((input + 12) * x);
  } else {
    x = 1;
    output = (output * ((25 * x) + 1)) + ((input + 12) * x);
  }

  // Digit 14
  input = nextDigit();
  x = (output % 26) + 0;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x == input) {
    x = 0;
    output = (output * ((25 * x) + 1)) + ((input + 10) * x);
  } else {
    x = 1;
    output = (output * ((25 * x) + 1)) + ((input + 10) * x);
  }
}

Console.WriteLine("Working!");
RunProgram();
