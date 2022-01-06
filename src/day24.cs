using System;
using System.Linq;

static void RunProgram() {
  long w, x, y, z;
  
  w = nextDigit();
  x = z;
  x = x % 26;
  x = x + 13;
  x = x == w ? 0 : 1;
  y = (25 * x) + 1;
  z = z * y;
  y = (w + 6) * x;
  z = z + y;
  
  w = nextDigit();
  x = z;
  x = x % 26;
  x = x + 15;
  x = x == w ? 0 : 1;
  y = (25 * x) + 1;
  z = z * y;
  y = (w + 7) * x;
  z = z + y;
  
  w = nextDigit();
  x = z;
  x = x % 26;
  x = x + 15;
  x = x == w ? 0 : 1;
  y = (25 * x) + 1;
  z = z * y;
  y = (w + 10) * x;
  z = z + y;
  
  w = nextDigit();
  x = z;
  x = x % 26;
  x = x + 11;
  x = x == w ? 0 : 1;
  y = (25 * x) + 1;
  z = z * y;
  y = (w + 2) * x;
  z = z + y;
  
  w = nextDigit();
  x = z;
  x = x % 26;
  z = z / 26; // div z 26
  x = x + -7;
  x = x == w ? 0 : 1;
  y = (25 * x) + 1;
  z = z * y;
  y = (w + 15) * x;
  z = z + y;
  
  w = nextDigit();
  x = z;
  x = x % 26;
  x = x + 10;
  x = x == w ? 0 : 1;
  y = (25 * x) + 1;
  z = z * y;
  y = (w + 8) * x;
  z = z + y;
  
  w = nextDigit();
  x = z;
  x = x % 26;
  x = x + 10;
  x = x == w ? 0 : 1;
  y = (25 * x) + 1;
  z = z * y;
  y = (w + 1) * x;
  z = z + y;
  
  w = nextDigit();
  x = z;
  x = x % 26;
  z = z / 26; // div z 26
  x = x + -5;
  x = x == w ? 0 : 1;
  y = (25 * x) + 1;
  z = z * y;
  y = (w + 10) * x;
  z = z + y;
  
  w = nextDigit();
  x = z;
  x = x % 26;
  x = x + 15;
  x = x == w ? 0 : 1;
  y = (25 * x) + 1;
  z = z * y;
  y = (w + 5) * x;
  z = z + y;
  
  w = nextDigit();
  x = z;
  x = x % 26;
  z = z / 26; // div z 26
  x = x + -3;
  x = x == w ? 0 : 1;
  y = (25 * x) + 1;
  z = z * y;
  y = (w + 3) * x;
  z = z + y;
  
  w = nextDigit();
  x = z;
  x = x % 26;
  z = z / 26; // div z 26
  x = x + 0;
  x = x == w ? 0 : 1;
  y = (25 * x) + 1;
  z = z * y;
  y = (w + 5) * x;
  z = z + y;
  
  w = nextDigit();
  x = z;
  x = x % 26;
  z = z / 26; // div z 26
  x = x + -5;
  x = x == w ? 0 : 1;
  y = (25 * x) + 1;
  z = z * y;
  y = (w + 11) * x;
  z = z + y;
  
  w = nextDigit();
  x = z;
  x = x % 26;
  z = z / 26; // div z 26
  x = x + -9;
  x = x == w ? 0 : 1;
  y = (25 * x) + 1;
  z = z * y;
  y = (w + 12) * x;
  z = z + y;
  
  w = nextDigit();
  x = z;
  x = x % 26;
  z = z / 26; // div z 26
  x = x + 0;
  x = x == w ? 0 : 1;
  y = (25 * x) + 1;
  z = z * y;
  y = (w + 10) * x;
  z = z + y;
}

Console.WriteLine("Working!");
RunProgram();
