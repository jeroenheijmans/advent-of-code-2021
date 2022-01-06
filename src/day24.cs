using System;
using System.Linq;

static void RunProgram() {
  long w, x, y, z;
  
  w = nextDigit();
  x = z;
  x = x % 26;
  x = x + 13;
  x = x == w ? 0 : 1;
  z = (z * ((25 * x) + 1)) + ((w + 6) * x);
  
  w = nextDigit();
  x = z;
  x = x % 26;
  x = x + 15;
  x = x == w ? 0 : 1;
  z = (z * ((25 * x) + 1)) + ((w + 7) * x);
  
  w = nextDigit();
  x = z;
  x = x % 26;
  x = x + 15;
  x = x == w ? 0 : 1;
  z = (z * ((25 * x) + 1)) + ((w + 10) * x);
  
  w = nextDigit();
  x = z;
  x = x % 26;
  x = x + 11;
  x = x == w ? 0 : 1;
  z = (z * ((25 * x) + 1)) + ((w + 2) * x);
  
  w = nextDigit();
  x = z;
  x = x % 26;
  z = z / 26; // div z 26
  x = x + -7;
  x = x == w ? 0 : 1;
  z = (z * ((25 * x) + 1)) + ((w + 15) * x);
  
  w = nextDigit();
  x = z;
  x = x % 26;
  x = x + 10;
  x = x == w ? 0 : 1;
  z = (z * ((25 * x) + 1)) + ((w + 8) * x);
  
  w = nextDigit();
  x = z;
  x = x % 26;
  x = x + 10;
  x = x == w ? 0 : 1;
  z = (z * ((25 * x) + 1)) + ((w + 1) * x);
  
  w = nextDigit();
  x = z;
  x = x % 26;
  z = z / 26; // div z 26
  x = x + -5;
  x = x == w ? 0 : 1;
  z = (z * ((25 * x) + 1)) + ((w + 10) * x);
  
  w = nextDigit();
  x = z;
  x = x % 26;
  x = x + 15;
  x = x == w ? 0 : 1;
  z = (z * ((25 * x) + 1)) + ((w + 5) * x);
  
  w = nextDigit();
  x = z;
  x = x % 26;
  z = z / 26; // div z 26
  x = x + -3;
  x = x == w ? 0 : 1;
  z = (z * ((25 * x) + 1)) + ((w + 3) * x);
  
  w = nextDigit();
  x = z;
  x = x % 26;
  z = z / 26; // div z 26
  x = x + 0;
  x = x == w ? 0 : 1;
  z = (z * ((25 * x) + 1)) + ((w + 5) * x);
  
  w = nextDigit();
  x = z;
  x = x % 26;
  z = z / 26; // div z 26
  x = x + -5;
  x = x == w ? 0 : 1;
  z = (z * ((25 * x) + 1)) + ((w + 11) * x);
  
  w = nextDigit();
  x = z;
  x = x % 26;
  z = z / 26; // div z 26
  x = x + -9;
  x = x == w ? 0 : 1;
  z = (z * ((25 * x) + 1)) + ((w + 12) * x);
  
  w = nextDigit();
  x = z;
  x = x % 26;
  z = z / 26; // div z 26
  x = x + 0;
  x = x == w ? 0 : 1;
  z = (z * ((25 * x) + 1)) + ((w + 10) * x);
}

Console.WriteLine("Working!");
RunProgram();
