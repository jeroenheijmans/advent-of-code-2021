using System;
using System.Linq;

static void RunProgram() {
  long input, x, y, output;

  // Digit 01
  input = nextDigit();
  x = (output % 26) + 13;
  if (x == input) {
    // x = 0 so nothing happens
    output = output;
  } else {
    // x = 1
    output = (output * 26) + (input + 6);
  }

  // Digit 02
  input = nextDigit();
  x = (output % 26) + 15;
  if (x == input) {
    // x = 0 so nothing happens
    output = output;
  } else {
    // x = 1
    output = (output * 26) + (input + 7);
  }

  // Digit 03
  input = nextDigit();
  x = (output % 26) + 15;
  if (x == input) {
    // x = 0 so nothing happens
    output = output;
  } else {
    // x = 1
    output = (output * 26) + (input + 10);
  }

  // Digit 04
  input = nextDigit();
  x = (output % 26) + 11;
  if (x == input) {
    // x = 0 so nothing happens
    output = output;
  } else {
    // x = 1
    output = (output * 26) + (input + 2);
  }

  // Digit 05
  input = nextDigit();
  x = (output % 26) + -7;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x == input) {
    // x = 0 so nothing happens
    output = output;
  } else {
    // x = 1
    output = (output * 26) + (input + 15);
  }

  // Digit 06
  input = nextDigit();
  x = (output % 26) + 10;
  if (x == input) {
    // x = 0 so nothing happens
    output = output;
  } else {
    // x = 1
    output = (output * 26) + (input + 8);
  }

  // Digit 07
  input = nextDigit();
  x = (output % 26) + 10;
  if (x == input) {
    // x = 0 so nothing happens
    output = output;
  } else {
    // x = 1
    output = (output * 26) + (input + 1);
  }

  // Digit 08
  input = nextDigit();
  x = (output % 26) + -5;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x == input) {
    // x = 0 so nothing happens
    output = output;
  } else {
    // x = 1
    output = (output * 26) + (input + 10);
  }

  // Digit 09
  input = nextDigit();
  x = (output % 26) + 15;
  if (x == input) {
    // x = 0 so nothing happens
    output = output;
  } else {
    // x = 1
    output = (output * 26) + (input + 5);
  }

  // Digit 10
  input = nextDigit();
  x = (output % 26) + -3;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x == input) {
    // x = 0 so nothing happens
    output = output;
  } else {
    // x = 1
    output = (output * 26) + (input + 3);
  }

  // Digit 11
  input = nextDigit();
  x = (output % 26) + 0;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x == input) {
    // x = 0 so nothing happens
    output = output;
  } else {
    // x = 1
    output = (output * 26) + (input + 5);
  }

  // Digit 12
  input = nextDigit();
  x = (output % 26) + -5;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x == input) {
    // x = 0 so nothing happens
    output = output;
  } else {
    // x = 1
    output = (output * 26) + (input + 11);
  }

  // Digit 13
  input = nextDigit();
  x = (output % 26) + -9;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x == input) {
    // x = 0 so nothing happens
    output = output;
  } else {
    // x = 1
    output = (output * 26) + (input + 12);
  }

  // Digit 14
  input = nextDigit();
  x = (output % 26) + 0;
  output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
  if (x == input) {
    // x = 0 so nothing happens
    output = output;
  } else {
    // x = 1
    output = (output * 26) + (input + 10);
  }
}

Console.WriteLine("Working!");
RunProgram();
