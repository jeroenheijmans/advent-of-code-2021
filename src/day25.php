<?php

ini_set('memory_limit', '512M');
require_once "../vendor/autoload.php";
use Illuminate\Support\Collection;
function collect($value = null) { return new Collection($value); }

$input = "
v>...>>>.>v.v..v.>.>.>>>..v..v.>.v.vv>.....>>>>v...>>.>..v>.>vv.>.v.>vv..v.v.v.>.v.....v..v>v>.v....vvvv>v.v.v>v.v>vv..>.v...>>>vv.v.v.>>..
v>.>.v....>...v..v.>.>..>.v.>..>vv.....>..>..vv..vvvvvv.>v>.>.>.>vv....>.v.vv...>..v.....v......v>.v..>v.v>..>.>.v.vvvv>..vv.>v>v.v.vv.v.vv
...vv...vv.>.v..v..>.>....v.>..>...v>...v>...vv>......>>vvv>.>v>.>>vvvv>...v..>>.v..v.>vv..........>v>v>...>.>v.>v>.v..>....v..>>>>...vv..>
>>...>.>....vv.v..>>..v...>>...>.v.>vvv...>v..>>v.vv>..>...v..v.v>vv..>vv..>.v..v..>v.v..>........>.v>v..vvv.v...vvv.>..vvv.>>.v..v.....vv.
>v.>.vv>>...>>v...>..>.>.v.v>.v..v.>>.v.>.v..>.v.v.vv>.v.vv>>vv..>..>..>v.v.....>.v..v>>.v.>vv...>.>.>>>.vv>>>>...v.>..vv.v...v......v...v>
.v...v>.>v.v..v.v...v>v.v>vvv>..>..vv.vv>v.v.....vvv....vv>....>.....v>v.>.v>..v...>>v>v....>>v.>.>v..v>.v.v.vv>v.>v.>v..vv..>v.....>..>..v
.vv.>.>>....>v>v.......>..>.>>......v.v..>>...v.>v>..v>.>..>.>>vv>>...>>..v.v.v....v.>..v..>....>.........vvv...>.>.>..v>>v>..v>.v..v>.v>>.
.v>...vv>v.>v...>vv.v.>.>v.v..>.v.>>>..v...>>>.>.v...........>v..>v>v.>vv....vvv.v.v>..>v>.>>..vv.>..v>>v.v......>.>>vv>.v>v.v.>>..>v>>>v.v
.v......v>>>v>v..v.>>v>.v..v>.>>>.v.>>>....v.....v..v..>.>>>v.>v......v....>v.>...v>.v.>.>v..>>.v.>v>v>...>vvvv...>v>..>vv.>....>.v.v.v....
v....>.>v>.>..>...>v..v.>v..vv.>.>v>vv..>vv>>>>>v.v>..>v..>.>...v>v..>>>>.>.v.v..>.>..v.v>...>..>.>>v..>v..>vv>.v>>...>>>.>vv>v...>...>>>>.
>.>v.v.vv>v..vv.v..v>v..v>......>v.>>>.>>>v..v.v.v>..v.vv....v..>v.v>v>.>.>v.v>>.>.v....v.....>v.>v.vv.>......v...v...>...>vvv.......>>.v..
.v..v.v.>>v...v>>...>vv.>.vvv>.v>vv.>vv>.>v.v>>>>>....>v.v>vvv>v.v>.>..>...>..>.vv..v>>.>...v>v..v...v.v>v.>>.>.v>....v.v.v..>>>.vvv>.vv>>>
.vvv>...vv.v>.>>v.>v>>>v>vv........>v..v.>..>...v..v..v..v>...v.>......>>v>>.>v..>>vv>....>.>vvv.vvv...v.>..v.>>.>>.>...>.vv.....v..>v>.v>>
>>>.v.v.v.v>.v>.>.>v.>.>.....>.v>.>..>.>..v.>>v..>...v...>>.....>v.>..vvv..>v..>...vv>..v>.v.v>>v.vv>.>v..>..>>.v>.v..>..v.>v>v.>v..>>>vv.v
.v.....>..>v>>vv...>.v.....vvv>.v>..vv.....>..>.............>..>.v>v>vv.>.>.>.v.>...>>.>>.>.>v..>>v.>...>v...v>.v..vv..>>v>.>..v>.vvv...v.v
v.>v..>v>.>v>v...vv.vvvvv.>.vvv...v..>>v.......>vv.v.vv.v.v.vv>..>>>v>>.v>.>>>.>vv.v>>v.vv..>>.v>.v>.v...v...v..>..v...v>v>.v...v.>>vv.v.>>
v>.v.v.>.>...>v.v..v..vv..vv>.v>.vv..>......>>vv>>..>..>v>.>>v.....vv>.>.>v>..>v.>.>>.....>.v>..v....v....>v.v>....v.>.v.v.vvv>.....>v.>.v.
....>>>v.>>.v.>..v...>.v.>..>.>v.>....>v..v.>....v...>...v....>.v>>v.>>v>vv..v>v....>v...>>v.v>>....>..>.vv.v.vv>v>>>>>.v.>v>v.v..>..>v....
...>>v>v.>>...>..vvvvv>.v.vv.>.v.>>v>..v.vv>v.>vv.....>.vvv>>>v.v..vvvvvvv.>>vvv>v...>..>.v>>v>...vv>..>..>......v..>.v..>v>>.>>>>..v.>>v.v
..vvvv..v.>>.>.>>>.v.v..v.>v.>.v>v.v>..>.v.v.v.>..v>>.>...vvv.v..>...v....v.v>vv>...v.vv>..>vv.v>v>v...>.vv....>.v>...>v...>>>>..>>....vvvv
v..v.>>>>v..>vvvv>.>v.>v...>>..>v>v...v.>......>>>.......vv.vv>..>...v..>vvv.>.>.v>v.v>.v>......>...v.>..>.v.>.>v>..>....vv.>....vvv...v...
.v.v>....>.>..>...v>..v>>..>>.v.v>v.>.>..>.>.v....>v......vvv>..>>.....>.v..v>.v>v..>.v..v..vvv.v>..>.>.v...>..vv.>v.>v>..v>..>...>.>>.vv.>
v.vv>v.vv...>..>..>..>..>vv>v.>..>.>..>v..>>v>.vvvv>v.>v>vv.>v...vv.v.v.v...vv>.>.....vvvv..>v..v..vv.>v>v.v.>..>.v..>.....vv>>.....vv>...v
..v..v.>>.>v..v>..>...v...>v>>.vv>.>>.v..v>...>..>>..vv.>.v.>>..v>vv>..vv>vv>.v>...vv...v.>>.v..v>.v>>.v.....v..vv>>v>>v>...>v...>.....>.>>
..v....>vv>v.vv..........vv..>>.vv......v..vvv..v>>>v.v.>>.v>>..v..>..vv>v..>>>..>......>v>vv>.>>v....v.v>>.v.>....>>..>v>>.>...>..>vv..>v>
>...>.>>>.>.v..>v>>..v.....>>......v>>..v....>.>v>.>v.>>>vv....>v.v...v..>.>.v.v..>vv>.v>>..v.>vv>.>>...v..>vv.v>.>>.....>.v.v..v...v..>v>>
v....v>.>>>vv>..v>>v....>>>..vvv.>.>..vv...v..>>v.>...>>....>>>.>.>.v.v.......>.v..vv>vv...>v.>v>v.v>v.>>v>v>v>.....>.v>..>...>v>v>...>.v.v
v...>.>.....>.v>vv>>.v..vv..v.v.v.vvvvv.v...v>>.v>...v.v....vv....v>v.>v.>v..>..v.v>>..v>vv>vv.v.>>>.>...v.v..>.v>v>v..v>....v>>..vv>.>>.>v
.v>>..v.vvv......vv...v>.>>v....v....v...>>.>v.>...v.v>>..>>.>v..>.v.........vv.>>>>vv.>..vvv...v....>.>v..v.....v.v..v>.v.............vv>v
v..v.vv..>>....v.>...vvvvvv.v>.....>..v.>>>.v.v>..v.>vv..>.....>v.>v.v.v>......v..>>.>v...vvv>.v>v..>>>>v.>...>...v>.>v.>.>>.....vvv....vv.
....>>..>...>v.>>...v..v.>..>vvv>>v.v>>.vv>...v>....>vv>.vv.>v>>>v..>>>..>.>v..>>v.>vv.>......v>>v.vvv.v.v>.v.v...vv>>vv..>....v>....vv..vv
.>vv>.....vv>.v...>>..>>vv.>>v>...>v..>>.v>v....>....v......>v..v>...v.vv.vv..>v.>.v.>>...>.v..v.v.vv..>.>>vv.>>...>.>..>.v>..v>>v.vv.v.vvv
v.vv.v>>vv>vvv..v.......>>....>v..v>..v.v>v>.>v.v..>v>.v>v.v...>...vv...>.>.>>......v...>...v>..>.v>..vvv>.vvv>vv>>>>...v.vv.>.v.v..v.v>.>v
..>>>..>>v.v...>..>..vvv.v.>>.>.>.v.v..vv>>..>>.v.v.......vvv.>.v..>v>........>.v.>v...>..v>v...>.......>>..>v>.....>vv.v>v.v..>>...v....>.
v.>>>>..>..>>>.vv..>.>..vv..vv..v...>v>...v.>v.>.vv>..v>.....>.>v>.vvv.>.>>v.>..v..v.v...vv.>...>..>>>.>..>.v.>.>..v.v..v>>.v...>v>>.>.v..v
>v.v>v>.v>>v>....v.v>v.>.v..>>....v>v.>>>.vv>.vv....>..v>.vv.>.vvv.v..>....v.......vvv.v>v>v..v..v....v>v>v>.v..v.>..>....>>>..>..v.v.>...v
>>...v>vv>>...vv>>..>.vvvvv>.>.vv.>v>.>.>>>v..>>v..>vv.>>>>..>v...v.v>.......>vv>>...v>.v..>>.>.>v>..>>.....>.>..>vv..>.>..>vvv>.vv.vv>v.>.
...>.>v.>>vvv>vv>>...v.>v...vv>.>.>v.>....>...v.>v.vv.>vv>.>.>.>...>...>>>.v......>.....v.vv.....v.>>..>..v...vvv.>...v..vv>v>..v.>..v..>.v
v>v>>..v>v...>.>vv.>...>>v.>vvv..vv>.>v.....v>v.>v..>v...>..>.>.>v.>.....>..>vv>v..>...v.vv>.v>>v.>v....v>.....v......>..>.........>>...>v.
v.>.>>>.>v>.......v..>v>v....>..v....v.>.....vv.>.>.>>>v..>v..>.v.vv>...v>vv.>v.>...>>..>>>>v..>v.....>.>>>v..>.>>v.>>>......v.>.>vv..vv.>.
.v..v>vv..>..>.vv..v>.>..>>...>>v>..v.....v....v..v.>.v....vv>.v>...v>.vv.>..v>..>vvv.v>.>.v>..>.>...>..v>.vv.>.>.v>v>v..>.vv.>.>v..v>.>>>.
v....>>.>.vv..>v>.v.>..v>.>vv..>.>>.vv.>.v...>v.>.>v....v...vv>..>.>.vv>vv..>...v.>.....>.>..v...>>..vv......>v>vv>v>v..>v>>.>v..v...v..>..
>...>.>v>...>v.>vv.v>.>v.....v.>.>...v>v.v....>.v>..>..v.v>.....vv.vv.>...>vv.>..>.v>.v.....>>.>v.vv>>..v>..>...>v>vv.>v>.>..v>v...>>v.v..v
v>>v>>.vv..vv>vvv.>vv.>.v..vvvv.v>v>..v..vvv>.....>..>.>v..>....>.v>v..>>>..vv.v>v..>v.>>>>.>.vv.v..vvv>>.vv...>.>.>....>>v..>.v>..vvvv>..v
v..>>>.vv....v.v........v>>>..>>..v>..v...>..v>v>.>v......v..vv.v...v.v..>vv>>vv>v>.>>v>.>>>>.v>.....vv..v..>v..>..>vv>>.vv....>>.vv>v>....
.>...vvv......vvv....v...>....v.v.>>.v...>>v>...v>v>v>v.>>v>v>vv.>v.>>>...>.>v>v.v..v.vvv..>vvv..v.>>..vv.......>vvv.vv.vv....v.vvv.>v>..>v
..>.vv>...>>.v.v.v.>.>>..v..v.>..>v.v.v..v>>.>.vv>...vv>>vv.....>vv.>>>vv>>>>>.>.v>........vv.v>>..v.v>..v....>>....>....>>....>v..v>v>>vv.
.....v.v..v....>v...v.v>>.>...>.>>v.>..>>.>>...>>>v.v...v>>>..>v.v...vv.vv..>.>.>>>.v>..>>v>v>........>.vv.>.>v..>>>..>>.>v..>...vv.>..>v..
.v...v>..>.>v.v.v>>.v..>v>>v>>vv.>vv.v.v>v.v...>>.>.>.>>.>v.>..>>>v..v>>.......v>...vv.....>.>v.>v>v...v.>...>>>.v....>.>v....>.>..>..>>.v.
>>v>vv.>.v>.>v.vv>....v>>...v.vv..v....vv>.v....v>.>...v>.vv.v.>.v.>>>.vv.v>>..v.>.....>.>.v>vvv>>vv.v...v...v.>.v..>.v..>.>...v.>......>vv
.v..v..>.vv>..>vv..v>>...v>v.>.>..v>vv.v>vv.vvv.v>...v>v>...v...>v>......>.>v>>v..v.v.>v..vv......v.>.>....v.>.v..v>..>..>.vv..v..>>...>.vv
v>.v...>.v..>.>>.v..>v>.v.>v.v.>>>.v>.v>v.vv.v.>.>.>.v..v.v....v..>.v.v..v..>>.>v.>...v....>.vv..vv.v.>.>..vv>..v.v..v.>.>.v>.v.vvvvv..v.v>
...>.vvvv..v.>v...>v.>v.>...>>>.v>.>.>v>...>>>>>>.v.>>.......v>>v..v.vv.vvv.>.vvvv.vv>.>v>..v.>...vv.vvvv>>>v.>..>v.>...v>vvv.v.....v.vvvv.
>..>..v......>.>>...>v.>v....>.v>..>...>.>...>.>.vv.>>.v.>>.>>>>.vv.vv....>..vvvv...v>.>.>>.>>.>>.v..v>.>..>.vv...>....v>v..>.....v>..v>..>
>..>....v.....v..v.....v...v.>..v....v......>v>..v>.....>>>>..vv.v...>>>....v.>>v....v.v.>>...>>.>>...v..>>>.v..>>.>..>.v.>.vv..v..>.v>...>
.v>>.>>..>vvv.v..>v>..>.v.v..>v......v>>.>>v>>>...>..>>v.vvvv.>.....v..vv.v...>vv>>>v.v..v>..>.v>.>...>>....v>.>..>>>>>.v>>>vv..>>....v.v.>
..v.vv...>.vvv..v.>...>v.......>..v>>>>>.v.>......>v.v>..v.>.>.>>>v......>.v>..v.v>.>.v..v>>..>>>v>>.v..>..v.>...v.....>.vv>...v...>...v...
.v>>v>vv>...>..>.v>.v....v>.vv.v...>.>..>v.....>...>>.>...>>v>vvv.v>>..>..v>>v>..>..vv..>..>v...v...v>..>>..v.v.>vvv....v.v>vvv..>>vv...v.v
.>v>..v.>>.vv....v>..>>>>>>.>.>>..v>.v>..>.....v>>v..v..>..v.v>>vvv..>..>.>.>.vvv.>..vvv...vv>>>..>>..v>>>>>vvv.v.>>...>....vv..vv.v>..vvv>
..v..>.v>>...>.>>>.>v>>v.v.>..>>..>>>v.....>.>>>v>.v.>.v....>v.>>v...>v.v.>..>.>.v>vvvv...vvvvv...v..>>.v..v>......>.>>>...v.>.v...>.....vv
vvvv.v...>v....>>>>.....vv>>>>..vvv.v..v.vv....>v.v..vvv.v..>v>>..v...v.v.>v.vv.v.>>vv>..>..v..>>...v>..v>>>.vv.v.vv..v..vv......v>v.>vv...
.v>>>..vv..>..>..v..>>>vv.>.>.v.>>v..........vv.>..>.>>.v.....>v>v.v.....>.v.v..vvvv>>...>>..v.v>v.v.v...v.....>>>..v.vv...>>...v>v.>>>>.v.
..vvv.>...vv..>vvv.v>>.vv>vv.v..vv....>...>v>>.>.>...v>..>.vv...>>...>v.>...v.>v......vv...v>>>.>.>...>v....vvv>..>>>>v>v>vv>vv..>.v>.v>>..
v>.>v......v...>v.>>v.v>>...>v>>..>.>...>..v.>.v..v.>.>v>vv>>.v..v.>...>v..v.....v>v...>vv.>....>v....v..>v.>vv..>>v..>>.v..>>.v>..>v..v>..
v>.vv.....v>>vv.>>...v..>..>>.vv.v..vv.>vvvv...v.vvv>v>>.....>vvv..v>.v.>.......>>vv>...vvv>v>vv..>vvv...>.vv>>.v.>>.v..>>.....v....>.>>..v
>..>.>v.v..>...v..>>..>.v.>v..v.>.v>>.>.>v>vv>.v.>>..vv>v>..>vv.......>......v>.>>>v...>..>.v>.>v.v..v.>v....>.>.v>.v>v>>v.v.v>>>.vv...vvv>
......v.v...>...v.>>.>v..>.>v....>.>>>...v>v...v.vv.vv>.v..v>>.>v..vv...>.vvvv...v.>>>.v>>.v..>.v>v..>..>.>.vv..v>.>.v.v>>>v>.>..>.>..>>>..
v....v.vv..>>>>..vv>>v...v>.>vv.>v>>.>..>.>>>...v..v.v.>v....>>v.vvv.v.>>...v.v>.vv..v.v.v.>.>>....vv>v.>>.>.>.v>.v>>>.....>.v>.>v>...>.>..
...>>..vv.>.v.v....>>..>.v..>v>.v...>...>v>v>v.>.v.vv>v....>v....>>>v..>>..>....>.>>>v.>.>...v..>>>.>vv..v>v....>....>..vvv>v>v.v>v..vv....
>vv>..>.vv.>>.v...>.>.>>.>v..v>vv...>v....v.vv>....v>...v.vv>...>>>.vv...>...v....>.v....>...v.vv..>.>v..>...>>>..>.v.v.v>>...>..>..>..v.>>
..vv>v>v>>>vvv>.vv>>vv..>>v>>..>v.>>.......>vv.v.vv....>v>..>.v>vv>>.vv.>>..vv.v>>>v.>...>....>>v>.......v>>>>.v>>>>>v.>>...>v.>vv.>.vv.>.v
>v>.v.>.>..>>>.v..>.v..>v..vvv.>..v>.>>.....v....vv.>..>.v.vv...v.v>.>.vv.>....>v..v>.v..>..>....>.v..v..>v>.>>..vv...>..v....>>v..>.v>>.v>
.>..>.....>vvv>.>..v>v.v..>vvv....>v>>>...>..>.>vvv..v.vv.>...>>v.....v.v..v>>>.v.>>vv..v.v..v......vv>v.>>.v.>v.>>>>..>v..v>.....v>.>v.v..
vv>.....>v>>v.>.>.>vv....v>..v.>.v.>vv>v......v.>>..>>.v>>>>.v>....v..>..v>.v.....>>.>....v.>...>v>>>>>.v.>.......>>v>...v..>>vv..>..>v.>vv
>>vv>..v.....v.v>vv.>..v>..vv>...>>>....>..v>v...>...vv.>>.>v>v>>..v.>...v...>.vvv.>>.>.v>v>.>>>...>..v.v>.vv>v.>.v..>...v..v..>..v..v.v>v>
v>....v.v>...vv...>v..v>v...>.>vvv....>.v...>>>v...>...v>>.v>v>>v>..>>>v.>..v.v.v>.v.vv>>..v.>.>..>>.v>v.>>>>...v>>.v.v>.>.v...>vv.vvvv.>v.
...vv...v.>.>.vvvv..v>.vv>.v.>.v>.>v>v......v...>v>>v...v>.>..>..>.>.>>>vv..>..>>.>v..>>>.>v>...>>>.>.>>v.v..v>...v>..v..v.>..vv.v.....>.>.
.>..>.>...........>.>.>v.>>>>v>.>v>.vv...v..>v.vv>..vv.>v.>>>..v.vv.....>>.v...>vv>.>>.v..v.....>v.....>vv.>vv...vv.vv>v.v....v......v..>vv
>v>..v>>>v>>vvv.....v..>>>v..>>>v..>>v>vv.>...v>.>>>.v.vv...v...v>>.....v.>vv..>..>>.vv.>..>......v.>....vv.>vv.....>>v...v>>v.vv>>..>.vv..
>.>v>>v..>.v..vv>.>....v..>>v....>...v>vv>.....vv.v...>v>.v>>..vvv......>...v...>v.v..>.>>.v>...>>>.vv.v>v...v.>...v..v.>v..>>v>>v..>...v..
>.>.>vvv>>.v...v..>v..>>.....>v.....>>vv.v>..>v...>v...>.v.v>>.v>......>>v...>..>.>......>.>..>...vvv>vv>.v.v.v>..vvv>.>.......v.v.>>>v>v>.
...v.v.>.v.>.>.v.>.>>v>v..>>..>>.vv..>>.>>.v>v>>.>...>>>.v.vv>..vv>...>>vv....v.>.v...>>..vv>.>..v>v...>..v..>>....>>>v.vv>>v..>.v....>.>.v
>>v.>>.v>>....>..vvv>v>>v..>vv....>.....vv.vvv>........>v.v.vv>>.v..>v.vv>vv.>>...>..>.v>.>.>>.v.v>v>...vv..v.v>..v>.v>....>vv>>....vv>...v
v.v...v.v.vvv>vv>.vvv.vv.>v>v.v....>.....>>..>.vv.>.>..v....v..v.v...vv.vvvvv......>v.vv..v>v>vv.v...v.>...v>>>v.v>v>.>..vvv.>.v.>v.>.>>v..
...>>>>.v..v.>..v.>v.v>..vv.>.>vv.>>.v>.>....v..v...>.>..vv.>..v.>.v>>...>.>...v.>>.>.vv>v>.>.>..>vv.>vv>...>.v.>.v..>>..>..v>vv.v.v.v.....
.>..vv...vvv>.....vvv>.>v.>vv.v..>.>vv.v.v..>>>..>v.v..vv..>..>v.v>>v...>>.>>.v>>v>..>...>>vv>>..v>......v>.>.v.v...v..v.v.v.v...vv..v>..v.
...v......vv>v.vv>>>.v.>.v.v.....v..>>v.>v.vv>v>>....>......v...>>..>....>>vvv.>v..>....>..v>>>>.>>v>v..>>>.>>v>>v....v.>v.vv>.>....v.>...>
..>>>>v>...v.v..vv>...v>>>>.>..v>.........v.>.>...v.>>...>..v>.>...v..vv.v>>.v..>.....>..>vv.v.v.>.>v>..v>>v.v>v>v>.....>vvv.>>>>>>vvv>.v.>
.v..v....v.vv.v.v..vv>..>>v....v.vv...>.>...>>.v.vv....v>.v.v.>>v>....vv>>..v...v....>.>>.>v......>>.v>v..>..v>vv.>..>>>....v..>...vvv.>>v>
..v>.v....v.>.>v>.>.v...vv>>..>.v...>>v.v...>>..vv>.....v.vv.>>>v>.>..v.>>v......vv>>v.>v..v>>..>..>>..>...>vv....v.vv..v>v.vv...>...>.>v>>
>.vvv.......>.>>...v>v..>.>>v..v.vvv..v.v..>..>>vv>.vv>..v..>...v.v....v.v........>v>>>.vv..v.....>.>v.>v.>v.v........>>v>.v>..>.>..>v>v...
....>vv...v.>>...vv>.....v....v>v.>..vv>.v.vv>>..v>v.v.v.v>vv..v..>v>.v....>v>...>v.....>v...v..v.>.>v>....>....v.v..>>v>>v..>>>>v>>>.>>...
.....v>v>.>.v...v.>>..v>>>>vvv.vv...vv>>.>..v..>v>..>..>..>vv>v....>>v..vv>..v>..>.v..>>vv>>v.v>...>>>.vv.>>.>..vvv>>v>..>v..v.>v.>..v.>...
v..>.>v>.v....v>>>.>...v...v.>>>>..vv...>.>>.>>v.>.>v..v>..>v>....>v>.v>>v.v..v>>.v.>...>..>v...>>>....>vv..v>>v.>>...>v.v.>v...>....>.>v..
...v>>.v.v.....v......>v.....vv>>.>.v.v>.>>>.vv>>.vv..>...>....v>..v>>>>.v..v>>>v>.v>>..>.>...>v...vvvv.>.v...>.>v.>v.>..vv.....>>>>..v..v.
..>>.>>..v>..>vv>>.>.v.vv....>v.v.>>>v>v.v>vv>>>vv...vv.>>...>.v.....v.>.>>.>.vv.v.>>v...vv..vvvv.>....v..>>.>>v.>.v>v.>...v.>.vv.v>>...v>v
..vvvv.v..>v.....>..v.>.>>v.v...>>..>.>.vv...v>v..>.>....>.v.v..v>.....vv...v....>....>...>v..vv>vv...v...>.>..>....>.v.>>v.v.>v.v>.vv>>vv>
.v..>vv>>>.v.>v..>v.>>.v.v...>.v..v.v.....>vv.v.>>vv...v>.>.>....vv.>..vvv.>...v>v>>.>...>>>>..v..v..vv...>.>.v..vv>.>v..>..v.....v.>...v.v
>.v...v.vv>>......>>>>v....>v.>vv>.>>.>v>v..v...>>v..>....v.v.....>...>v....vv.v>....>.>..v.vv..v>v>.>v....vv..v..>v........>.v>.v.........
v.>..vv>...>>.v.vv..>.>v>....v..>.vv..>..>>.>..>vv...v..vvvv>....v..>v.v.>.>.v>....v..>>v>>...v.>>v.v..v.v...>v.v>..v..v>.......>.v...v.vv.
v.>v>v>v>>>...v>.>>..v.>vv>.v..>.vv.>>v>v..>>vvv>.v.....>>.>v.v..>....v.>v.>v.....v>.v>>...v>..>..v.v....v..v...>.v..v....>>.>vvv>..>>.vv..
>v>>.>..v....>v.v...>>>v.>.>..v.>.vvv>v..vv.>vvv.v.>>>v>vvv.>>.>.v.......>>.>.>v>..vv>......v.>>>..v>vv..>..>>..v>vv>>vv.vv.vv.v...v...v.>>
.>.v..v.vv>.>.v..........vv...vvv.v.v.>........>....v>v.vvv.v..v>.....vvv>..v...>..>v>v>>v.>v>v..>.>v>v..v.>.v.>v.>..vvv>.>>>>.vv>>..>v>>.v
.....>vvvv..vv.vvv...vvv...vv>vv.v>>>.v>..v>.v...vv.vv>vv>.>vvvv...>vv...vv>.vv>>>..>.>>>.>vv..>...v.>...vv.>>>...v...vv.>vv.>vvv....>v>>.v
v>..>..v>>>v.>>v.vv>v>..vv>.>....>>>......>..>>..v.>..vv.v...v.>.vv.>>.>>.>..v.......>v.v.>.v.v>.v.v>>.v..vv>.vv.>>>v.v>...>...vv..v.>v>.v.
v.vvvvv..v.>.>.v.>..>>>..vv.>>>vv.......vv..v.....v.vv...v.v>.....>>.vv..>.>>.v..>v.v.v>.>>..v.>........>.v>..>v>>>>>>v.>..>..>v>.vv.vvv...
>..v>v.>>v>v.>..>>vvv>..>v>>v>..>.v.>>.vvv>.>vv.>vv.v........v>v.v..>...>v....v...>.v.>...>vv...v..vv........>...>v.v>..v..v>>..v.>>.v.vv>.
..v.v>.v.v.v>v....>.>>>.>.v>>..vvv>v>.v.>vv.>..>.v>v>v.>vv.vv.v.v.vv..v>.vv.vv.vv.>>...vvv.>..>.>v>......v.>.v>vv.>.v..vv>.v>.v>>.....v.>.>
v.v....>>..v...v>v>vvv....>>....>v>vv.vv>v.>>.vv..>.v.>....>>v..>>>vv..>.......>>....vv.>v>v.v.....v.>.>.>v>>>>..>>..v.>...>>>...vv>v>..>v.
.>.>..vv>>>...vvv.v>..>>v>v.v.v>vv..vv>v>>.vv....v>>v....v>>.vv>v...v..>v>v>.>.>.>>>....>.>.>..vv>v.v.>>...>v>..>.>vv.>..vv..>v..>v.v.....v
>v........>>v....v..>v.v..>.vv>..>v.v.v>>>>v>>vvv>.v>v.>.>.v.v.vvv..vv>..>..>v>.v>..>v.v...>.>.v>..>vvv.....v......>>>.>.v>.>vvv..v>.>v>vv>
..v.>>>>.>v.>>>.....>v>.>..vv..>>v..v.>.....>vv...>>..v..v.v..v>.>..>vv.>...v.v....v.>v.>.>...vvv.vv>.....v.....>.v>.v>.>..>....vv.>v.v....
.v>>.......v.v.v..>>..>v..>vv....>vvvvv.>.>..>...vv.>>v..vv....>v>.>>.>.vvv.>.v....vv>v.vv.>vv......>.>>>>.>.>vvv>vv.v.v..>.v..>..>.......>
.vv..>>..>....vv.vv..>.>.....>>.>.>..vv...>v>.vv>..>v.v>.>...>..v.vv..>.>v>>...>v..v...v...v>.>>>>..>.>>v....>.v..v.v.....>>v.....v.vv....v
..vv>vv...v.>>>v....v>.vv..v>v.>.v>.>v>>.>.v..>.vv...>.v.>.>.v..v.>..v.>>>..>..vv.>..>..>v>..>.>v...v>...>>>....>v...v.vv.>>.vv.>vv>v>>>.>>
>..vv>>vvv..>vvv..v>v.>...>..v>>vv.>v..>.v>.>.>.>v.>vvv>>.>.......v...>>v..>...vvvv>>v>.v..>>vvvvv.v..v>.>..>v....>..v>...>vv>>v.>vvv>...>.
v.v..>..>v...v..>>>v..v>.vvv....>v.v...v.v.>...vv.>v>.v>...>vv>vv.v>vv.v.v..vvv>..>>v.v>v>..>.>v..v..>vv>v.......>.>.v.>..vv.v.v>>.>.>...vv
...>>>v..>v..>>v.>.vvv.v.>>..>..vv>v.......>v.>.>....>v.vv.>..v>...v..>..v>...v>v.....v..v.>>>>>.>.>vv..>vv>vvv.>>>>..>.>v.v.v.>>>.v...>v>.
..vvv..>vv>.vv>v>.>>.>v.>vvv......>..>v...v.v.>.v..>vv>.vv.vvv>.......>.>...v>v.>v..v.>v.>v>vv...v>.>v.>v.v.....v.>>>v.>.v.v>.v..v>.vv....>
>v..v.v..v>>.>..>>...v.>.>......>..>.v.vvvv>vv>v..v>vvvv.>v..v>.....>..>>>...>.v..vv>v>.>..>v..v..v>>.....>.>>>...v>......>.vv..vvv>>......
.>>.v........vv.>.>.v>....v......v.>.>>..>v.v..>....>>.>.....>vv..>.>>.>v.vv..vv....>>..v.vv.>..>.>...>vv..v....>>>...>.v..v..v.>>...v>v...
>v..v.>>>>>....v...>..vv>.>.>>..>vv>vv.>>..>.>..v.vv>v.>>.>..v..v..>>vv.v>...v>v>v..>.>v.vvv...>>.v..>.>>.>>.....>.v>.>v.vv..vvv>......>v>.
....>.>>>>v>>.v>>...v..>>>.vv..v>>..>>.v.v>.v.v.>...v.>>...>v..v....vv.v.....v....>......>.....vv.>.vvvvv>....>vv..>>>v>vv>>v.....>>...v...
.>.....>v>...>v.>>..>v.>v>....vv..v>>..>.vv.v...v>..>..vv.v>..v..>v...>>v..v..v>v.v>.>v>v....v>.v>.vv..v....v.>>..>v..vv.v..>v>>.>>>..vvv.>
>v>>>v...>.>>vvv....v>vv...>...>v..>...>.>....v.v..>>..v>..vv>>>.........>v.v...>v......>>.>vv.......>.>.>..>..>>v>v.v..vv...>>v..>v>.>vv>>
..>v>v>v.vvv.v>.v>>>..>>v>....>.v.>...v>...>v.vv.vv>v..>.>v>vv.v.v.>...vv...v>>>>>vvv.>.v>.vv...>v....v.>...v..>..v..v.v...v>v.v.>v.>v..v..
.v.v.v.v>>.>.>.>>..v.v..v..v.v.>.>.>v>>.v....>>>....>>v>..>v....v......vv.>>..>...>...>>>.>.>>..v.>..>....>..v..vv.vvv>vvv...>>v>>.vv>v>v..
..>.v.>v.>>>>>>....vvv.v>.v.vv.>..v>v.........vv>.>v.v>v.vvv....>v>vv.>>..............v.v>>>..v>..>.>..vv....>.v>...>...v.....>>.vv>.v>..vv
.v...v.>.>.>>vv..>v>.>..>..vv>.>v...v>v.v..>v>.>>...v>v>...v...>..v>>........>v.>..v>..vv.v>v.>.vv>>.>vvv>v.>>>>>.v.v........>>>>..>.vv>v.v
>..v>v...>........v..>.>......v..v.>v.vv>>>>.>.>v.v>..>v.>>>vv....>....>v..>.>.>.v.vvv..>vv>..>v.......v>>>..vv..v..>v>>>...>v.>v.v>...vv>>
>.>....vv.vv.vv.vvv...v>>..>..>.>v.v>>.v.>v.v..>..>....>v..>>>>v.>..v..>>>v.v..v>>....v....v..>>>.>.v.>..>v..>...v...>v..v.>.v......v>.v.v.
.v.v..>....v..>v>vv.v>v>.v>.vvv......>.v..v.v.....>>.v...>..>..vv.>>.>.v..>....>.v>vv>..v>...>.>>vv>.vvvv.v.v>...>....>...>v.v...vvvv>....>
......v>v.vv..>v...vv..v>v....>.>v.>....>....>.>.>.>>...>>.v.>.>.>>v.v>.vv.v>>..>.>.v..>..>.v.....v.v.vv>.vvv....v.>..>.v.......v>.>..vv.v.
>>>...>.>vv>>>>>.>..........>vv>>...v....v.....v>vv.vv>..v>>..v...v>v.....vv>...vv.v..>.v..vv.v>.v.v.>.vvv.vv.>.>...>v>v..>.v>...>v...v.>.v
..>vv.....v.>.>>....vv........vv..>v..v.>.>.....>v>v>>.v.v.>>..v..vv.>v.>vv>v.>.>.vvv.>vv..v.vv.>.>>v....v..v.....v.v>v...v.>.vvv..v..>.>>.
v>vv>>v>.....v..v>v>v...v..>v..v>>.>v.vv>v>>.>..v.v...v>...>v.v.vv.>.v>v>.v...v.>vv>..>..>v.....v.>>...v>vvv>vv....>.v..>v....>..v>>v.>.>.>
.>.>.>.>>.>v.>.v.v..v.v..>v>>..v...>....v>v...v.v..v>.v...v>>v>>.vv...>>.>>>.>...v>vv>....>>..v.>v.v..>.....>>..>>>....v.>>..v..v.v.>..vv..
";

$data = array_map(fn($x) => str_split($x), explode(PHP_EOL, trim($input)));

function solvePart1($data): int {
  $maxx = count($data[0]);
  $maxy = count($data);
  $loop = 0;
  while(true) {
    // $level = implode("\n", array_map(fn($x) => implode($x), $data));
    // echo "After $loop step(s):\n$level\n\n";
    
    if ($loop++ >= 1000) throw new Error("Taking too long? Quitting after loop $loop");

    $newdata = $data;

    for ($y = 0; $y < $maxy; $y++) {
      for ($x = 0; $x < $maxx; $x++) {
        if ($data[$y][$x] !== ">") continue;
        
        $targetx = $x === $maxx - 1 ? 0 : $x + 1;

        if ($data[$y][$targetx] === ".") {
          $newdata[$y][$targetx] = ">";
          $newdata[$y][$x] = ".";
        }
      }
    }
    
    $newdata2 = $newdata;

    for ($y = 0; $y < $maxy; $y++) {
      for ($x = 0; $x < $maxx; $x++) {
        if ($newdata[$y][$x] !== "v") continue;
        
        $targety = $y === $maxy - 1 ? 0 : $y + 1;

        if ($newdata[$targety][$x] === ".") {
          $newdata2[$targety][$x] = "v";
          $newdata2[$y][$x] = ".";
        }
      }
    }

    if ($newdata2 === $data) break;

    $data = $newdata2;
  }

  return $loop;
}

function solvePart2($data): int {
  return -1;
}

echo "Solution 1: " . solvePart1($data) . "\n";
echo "Solution 2: " . solvePart2($data) . "\n";