using System;

namespace AdventOfCode2021Day24
{
    class Program
    {
        static int Main(string[] args)
        {
            if (args.Length != 2)
            {
                Console.WriteLine("Precisely 2 arguments needed to tell us the range for digit 1, so you can parallelize starting digits. Search default is descending (puzzle part 1).");
                return 1;
            }

            int a = int.Parse(args[0]);
            int b = int.Parse(args[1]);
            Console.WriteLine($"Starting digit from {a} to {b}");

            unchecked
            {

                for (int d1 = a; d1 > b; d1--)
                    for (int d2 = 9; d2 > 0; d2--)
                        for (int d3 = 9; d3 > 0; d3--)
                            for (int d4 = 9; d4 > 0; d4--)
                                for (int d5 = 9; d5 > 0; d5--)
                                    for (int d6 = 9; d6 > 0; d6--)
                                    {
                                        Console.WriteLine($"{DateTime.Now.ToString("HH:mm:ss")} --- Starting work on {d1}{d2}{d3}{d4}{d5}{d6}...");
                                        for (int d7 = 9; d7 > 0; d7--)
                                            for (int d8 = 9; d8 > 0; d8--)
                                                for (int d9 = 9; d9 > 0; d9--)
                                                    for (int da = 9; da > 0; da--)
                                                        for (int db = 9; db > 0; db--)
                                                            for (int dc = 9; dc > 0; dc--)
                                                                for (int dd = 9; dd > 0; dd--)
                                                                    for (int de = 9; de > 0; de--)
                                                                    {
                                                                        long output = 0, x;

                                                                        // Digit 01 - 04
                                                                        output = (d1 * 17_576) + (d2 * 676) + (d3 * 26) + d4 + 110_450;

                                                                        // Digit 05
                                                                        x = d4 - 5;
                                                                        output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
                                                                        if (x != d5) output = (output * 26) + (d5 + 15);

                                                                        // Digit 06
                                                                        output = (output * 26) + (d6 + 8);

                                                                        // Digit 07
                                                                        output = (output * 26) + (d7 + 1);

                                                                        // Digit 08
                                                                        x = d7 - 4;
                                                                        output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
                                                                        if (x != d8) output = (output * 26) + (d8 + 10);

                                                                        // Digit 09
                                                                        output = (output * 26) + (d9 + 5);

                                                                        // Digit 10
                                                                        x = d9 + 2;
                                                                        output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
                                                                        if (x != da) output = (output * 26) + (da + 3);

                                                                        // Digit 11
                                                                        x = (output % 26) + 0;
                                                                        output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
                                                                        if (x != db) output = (output * 26) + (db + 5);

                                                                        // Digit 12
                                                                        x = (output % 26) + -5;
                                                                        output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
                                                                        if (x != dc) output = (output * 26) + (dc + 11);

                                                                        // Digit 13
                                                                        x = (output % 26) + -9;
                                                                        output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
                                                                        if (x != dd) output = (output * 26) + (dd + 12);

                                                                        // Digit 14
                                                                        x = (output % 26) + 0;
                                                                        output = output / 26; // SPECIAL INPUT CHAR WHERE OUTPUT GETS LOWERED BY "/ 26" SEEMINGLY?
                                                                        if (x != de) output = (output * 26) + (de + 10);

                                                                        if (output == 0)
                                                                        {
                                                                            var serial = string.Join("", new int[] { d1, d2, d3, d4, d5, d6, d7, d8, d9, da, db, dc, dd, de });
                                                                            Console.WriteLine("Found the answer! => {0}", serial);
                                                                            return 0;
                                                                        }
                                                                    }

                            }
            }

            return 0;
        }
    }
}
