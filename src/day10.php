<?php

require_once '../vendor/autoload.php';

use Illuminate\Support\Collection;

function collect($value = null)
{
    return new Collection($value);
}

$input = "
[{[[{(((<[{{((()<>)(<><>))[{{}{}}((){})]}[<<()[]>[{}()]>[{<>{}}<()()>]]}{{[[{}<>]({}{})]<[{}
<[({(([<[[<([[(){}]<()()>])>[[(({})[<>()])]]]<[(({()[]})[{<>{}>(<>{})])<({<>()}[<>{}])(({}<>){()<>
([{[([(((<<<{({}())<()[]>}<[[]()]{<>{}})>[{[[][]]{<><>}}]>>)[[[{{({}<>)([]<>)}}({(()[])<()[]>})](<[[()()]<{}
(<([<<({<[[[([[]{})<()[]>)(<[]()>[{}<>])]<[{[]{}}<()[]>]<[<><>]>>]<{[({})[<>{}]]<[()[]](()<>)>}{((()
{<({{<{<[<({([()<>]{<>[]})<<{}<>>>}((([]{})((){}))[[(){}](<>[])]))>][[<(<{()()>{{}[]}><{{}()}(()<>)>)
{<([<<[<(<{<<(()[])[{}[]]>>(<{()[]}>({<>()}<[]()>))}>)>[{{{({<[]><(){}>]({{}[]}<{}<>>))<{<(){}><[]{}>}({<>{}}
{[[([{<<{{(({{<>{}]<{}{}>}[<{}<>><()()>]))({({{}[]}<<>[]>)(<<>>{[][]})})}<[(({[]{}}[{}{}])<(<>())<(){
[<(<[{[<{{[<[{{}}([][])]{({}{})(<>{}]}>{<(<>[])({}())>({[]<>}{[]()})}](<{[{}]<()[]>}<([][]){{}()}>>)}<<(<[()(
<([[<{<{<[{[[{()}<[]>]]<(<[]()>)>}([([{}[]]<[]<>>)(<[][]><()<>))]{<<()[]>((){})>([{}<>]([]{}))})]{
(<({[<((([<[{([]())<<><>>)](<{[]}[{}()]>[[{}<>]((){})])>{{{{{}<>}([][])}}}]{[(((<><>)<()()>)[([]<>
<(([<(<{({{{<[()[]]<[]()>)[(<>)<<>>]}[[<(){}>[{}<>]]<[<>()]([]<>)>]}[<[{{}<>}([]{})]{[{}()]}>]})}>(({(
<<(([[{{<[<[([()[]]<()[]>)<([][]){{}<>}>]<{[()[]]({}[])}<(<>[])>>>({<<[]()>{{}})}([<{}[]>[[]()]]))
{{{<<[<[<<[<{(()[])[[]{}]}[[[]()]{{}<>}]>[{(<>)[<>()]}]]>(<{[[()<>]<{}[]>]({{}}[(){}])}{<<[]>(
<([<<[{<[[{([([][])[{}()]][(<><>)[{}<>]])[(({}{}){{}<>})]}((({[][]}<()<>>)(({}{})[()<>])))][(<(({}<
{[<{[([[{[{[<{()<>}<<>[]>>{{<>()}[<><>]}]}]([{([[][]](()()))<{[]<>}[()<>]>}{<<<>{}>{[]<>}>}))}([(<(((){}){(
({<{[{[[{({<<(()<>){<>()}>(<()>{{}()})>({[[]()][{}]}{{<>{}]{{}[]}})})}]<{{[{[<<>[]>][(<>())<<>()>]}<{<{
([(([[[{<({{{[()()]{<>{}}}}<[[[]<>][{}{}]]({()()}{()()})>}({[[(){}][[]{}]]{({}[])[{}()]}}{{[<><>]}
((<[<{(({(<<[{()()>]<(<>)<[]<>>>><{<{}[]>([]())}{{[]()}<{}<>>}>>)}))}[{(<({{{([][])[(){}]}}<<<{}<>>{{}[]}>(<{
{<[[([<([<{([([]{}){{}<>}]([[]{}]({}())))[[<{}[]>{{}<>)]{({}[])[[]]}]}(([[[]{}][<>[]]](({}[]){{}{}}))
[<<[<[({<{([<<<>{}>(()[])><({}[])[{}<>]>]<[<[][]>{()[]}}<[{}()]>>)<<<(()[])>>>}{<{<<{}()>[[]()]>{[<>(
<(<(<[({{<<[[{()<>}[{}<>]][[[]()](()<>)]]{[<()>([]<>)]<[{}{}]<{}{}>>}>([[(()()){(){}}]]<[<[][]>{[]
<[{[{{{{<({[[({}{})][<{}{}>{[]{}}]]{[[()()]{<>[]}]<[<><>]<<><>>>}})>{({(<<()()>(<>{})>{(()[
<[(([(<<(<{<(<{}<>>{{}{}})[[[][]]([]())]>{{<()>[<>{}]}({<><>}({}()))}}>[([{(<><>)[()()]}[[{}[
<((<[{([{[([({{}<>}<[][]>)[<[]<>>(<>{})]])(({[{}[]][<><>]}[{()[]}<{}{}>]))]<<{(<[][]>[<>]][{()(
((<[<<({{((<[(<>())[[]{}]]{{[][]}<<>>}>({<[]()>[[]{}]}[({}[])(()())])){({(<>[])[{}()]}[[{}{}>]){{[()<>]{
{<<{{(({(<({({{}{}}<()<>>)}([[()[]]]))>)})[{([<<<<[]<>>>({()<>})>[[[{}<>]][(<><>)(<>[])]]>])}[(<<<{(
{<[<{[<(([{[<<{}()>([]())>[{<>}{{}[]}]]}][{<[([]{})<()<>>]{{[]()>[{}[]]}>[<<<>()>[<>()]>{([]<>){[]()}}]}[
<{{<{[<<[<<<(<{}[]><()[]>)<[()()]{()[]}>>{<<<>{}>{<>[]}>[<()()>{[]{}}]}><<{{[]{}}{{}{}}}>>>[{{{([]{})<{}[]>}}
(<{(([[{[[[(<[{}()]<{}[]>>{<<>>({}{})})]]]{{{{(<[]>(())){<()[]>({}[])}}[[<(){}>[[]<>]]([{}{}]<[]{}>)]}}[<<{<[
{{((({{[((((<<<>()><[]<>>>[[[]<>]<()()>])({(<>{})}[[{}<>]<{}[]>]))[<(([]())[{}<>])[<[]{}>({}<>)]>])[<[<
{{((<([(([([([[]<>][{}<>])(([]()))])]<(((<[][]>{[]()})([{}{}]{<>()})))>))])[([{{[[[<[]{}>[<><>]]<[[]()]>]<(
<(<[[((<[[{(<{[]{}}><[{}{}][{}[]]>)[<{[]()}[[]{})><[()<>]<{}()>>]}<[<{{}[]}{<>()}>{{<><>}{{}{}}
{{[[<(<[<(<{[{[]}[{}<>]][((){})[()()]]}<([<>{}]{[]{}}){({}{})[<>]}>>{{{{<>[]}(())}{<{}{}><(){}>}}}
(<<(([<[{<<[<(()[])>[{{}}([]<>)]][((()<>)<()<>>)<(<>){<>{}}>]>(<{[<>{}]<{}<>>}>)>}(([<<{<>[]}<<
{[[{{([({<{{({{}()}<()[]>)[(<>{}){[]{}}]}}<(<{<><>}({}<>)><[{}()]<<>[]>>)>>{{<(<<>[]><{}[]>)>}[[<[[]
[([{<<({<{<[<[[][]][{}{}]>({<><>})]<({<>{}})>><<<<<>[]>(()<>)>({()[]})>>}<([{<{}<>>{{}<>}}([<><>]{
{[{({(([<[((<{[]()}{{}()}>{<()[]>[<>{}]})([[()[]]][{()()}([]{})])){(<{[]{}}[{}()]>[{<>[]}{{}()}]
[{[{({[{{<(<<([]<>)[()[]]><<[]{}><<>{}>>>[([<>[]](()<>)}([{}{}](<>[]))])>[<(<[{}[]]><<<><>>[[]()]>)[{[()(
[{<[<[[{{<{{((<>{})<[]{}>)(<<>[]>({}[]))}[<([]())<<><>>><<()<>>({}())>]}{<{[<>{}]}{([][]){[][]}}>({<[]{}>
({<((<([{{[[(([])[[]])[[<>{}][[]]]][[[[][]}{{}<>}]([{}{}][()<>])]]{[<[[][]]({}())>{[{}<>][<><>]}]}}}
{<<{({[[({{{<(<>())(<>{})>(({}[])(<>{}))}<<{[]{}}<[]>>>}{{(<<>{}><{}{}>)(<()()><[]()>)}{[({}
<[{{([<[{[((<[(){}][<>[]]>(<{}()>[<>[]]})[[(<>){<>()}]])<(([[][]]<<>{}>)){<[<><>][<>[]]><({}())
([(([((<<<{([{[]{}}])<[{()()}(()[])]{[()<>][<><>]}>>><{{[(()())<{}<>>]}(([[][]](<>[])))}((([
[<(({{{(<({[[[()[]][()[]]]{[<><>]{[]<>}}>[([()()]([][]))[[{}{}]{[]{}}]]}{[[[<>][{}[]]]][{[<>()][()<
[<[<<(([{{<<[((){})[<>{}]]{<[]()>}><{(()[])}((()[])[(){}])>>}}(({{[({}[])<()[]>]{[[][]]}}{(<<><>>)([(){}
[{[[<(({{({[{<()<>>((){})}(({}{}))](<[()<>]({}{})><<<>{}>(<>())>)}{[<<<>()>{<><>}><(()[])<{}[]>>]))}<{[(
<([[{{(([<<<<({}())([][])>[[[]{}]{[]<>}]>[{{()[]}<()[]>)[{{}[]}<[][]>]]>{<<[(){}](<>[])>[[{}[]]]>(
[[[[({[{<{(<{[[]<>]<(){}>}([(){}>[{}{}])>[{[{}()]{(){}}}])}>}]<[<(<{[[[]()]<{}<>>](<[]><(){
{(<[({{<<(<{{{{}{}}}<{<><>}<{}{}>>}<[<{}{}><()[]>]([{}[]]{<><>})>>)>>{[[([{<<><>>{()()}}<<<
<[({<([{[{[({<{}{}><{}[]>})([<()()>{<><>}]([()[]]{{}[]})>]({<{()()}<[]()>>[{[]()}({}())]})
<(([{(<([([([(()())[(){}]](<[]{}>[<><>]))(({()<>}<<>()>)(<{}[]>({}[])))][{[[[][]]](<<><>>)}
<{{(<{<[{((((({})({}<>))(({}())(<>[]))){{{[][]}[(){}]}<({}<>)<{}<>>>})){<({[{}()]<[]<>>}((()[])(<>{
{({({{{<((<{<{()[]}({}[])>{<{}<>>(()[])}}{([<>][[][]])}>)({({[<>()]<<>{}>}<[<>]([]{})>){([[]{
{[<((({<([<({[<>](<>)}((<>[]))){[[()()][<>]](([]){{}{}})}>])(<[[[[{}()]][({}<>){<><>}]]{<[
[<<<[(<<{({{<<()<>>({}{})><[<>[]]({}{})>}<{[(){}][(){}>}[[<>{}]{<>()}]>})[{[[[{}]<[]<>>][{(){}}]]<{[(
[{((<[{<({[{<[[]<>][{}[]]>}[(([][])<<>()>){<{}{}>[{}()]}]][[{{()[]}<[]{}>}(({}<>)<{}[]>)]{<<[]<>><()()>}}]})>
{[{{(<[{{{({{<{}{}><()>}[{[]()}{[]<>}]})}}[<{<[<{}()>[()[]]]<{{}<>}{[]}>>{(<{}{}><()()>)}}{{({[]()})([
{<{{({([[<(<[<[]{}>{{}()}]<({}{}){(){}}>><([()()]<(){}>){([]())(()[])}>){([([]<>)]<{<><>}[()<>]>){{<[]<>>[(
<[([(([[<[<[[<<>[]>[[]<>]]]<({[]<>}{<>{}})<[(){}]<[]<>>>>>[(<([]())>)[{[(){}](<>{})}<<[]<>>{<
{<[(<<[{<(<<{({}{})[(){}]}{[{}[]]{[]()}}>{<<<>{}>{[]{}}>}>[<(<{}<>>){<(){}><{}<>>}>(<{<><>}{{}{}}><((){})
([(<[(({{({[<([][])[(){}]>{[[]()]}]<[{[][]}{{}[]}](<[]<>>{{}{}])>})}}({[([{(()())[[][]]}<((){})
{[<[(<<{([({{<{}[]>(<>)}<(<>())<<><>>>}{(([]<>){<>()})})((({<>}<<>[]>)[([]()){{}()}]){<{<>()}>})](<<<[{}[
<((<[{[[[<<(<{()[]}(()[])>((<><>)[{}{}])){(<<>()>{[][]})[<[]{}><()[]>]}>[{<<()[]>([][])><{[]{}}
[{{({[<<{[<<{(()()){{}{}}}<[{}[]]{[]{}}>>>({({(){}}[<><>])({{}{}}<{}()>)}[{({}<>)<{}()>}])](([({()
<(({([<[{(([(({}[])([]()))<<()<>>{[]<>})]<<<[][]>>(<{}<>><[]<>>)>){<[{<>}[<>[]]]{<{}<>>{[]<>}}>[<[<>[]][<>
([{<<[[[[([[<[[]]{<>[]}>{(()[])<(){}>}]<[<()[]>(<>())]({[]()}[[]()])>]<{<{()<>}<()[]>><<<>>{{}{}}>}>)
({{<<({(([<{(([][])[()[]])}[[[()<>](())])><[([{}()][{}<>])<[[]{}](()<>)>]>]{(<<((){})<(){}>>({
[(<([(<{{<[[[{{}<>}{<>{}}]({()<>}<()[]>)]{[<<>[]>[{}<>]]<[{}[]](()[])>}]>}<{<<{{{}[]}((){})}>}}<{<[{()()}[<
{<<[({[{{{[[{(()())({})}][<<<>{}>([]())>]][(([{}()]{()[]}))<({<>[]}[{}()])>]}[<(<<<><>>[[]{}]>)<<
<{{{(([[[(([<(()())({}<>)>({[]{}}{(){}})]({{()}<[]()>}([[]{}]{()[]})))({{{()[]}<[]<>>}<[<>()]<<>[]}>}[{<[][]>
[(<{<(([([<<<{[]()}<{}>>)<<{<>{}}{[]}>{<<>()>{{}<>}}>>][{<{[{}[]]}(<<>()>)>[{(<><>)({}<>)}<
[[<<<[({[[<<((<><>){<><>})[(<><>)[<>()]]>{<[{}]>}>]]}<{<([<{<>{}}<<>()>>({[]<>}{()()})]({<{}{}>{(){}}}>)>[[(<
{({[([{[[([<((()[])(()[]))<<{}()>{()()}>>({({}[])}[[<>()}<{}[]>])]<([{()<>}{<>()}]([()](<>{})))<<((
<[((([<[<({{(<<>()>[<>[]])(([]()){[]<>))}(({()[]}<(){}>)[[[]()]<<><>>])}{[{{{}<>}[<>{}]}][(([]<>)((){}))]}
((<<[[[{((<<([[]<>][<>{}])[{<>{}}(()[])]>([{(){}}{{}<>}][({}{})([]())])>)<[{{{(){}}<[]{}>}(<[]<>>({}<>))
[[[{({{[[<[<<<<><>>[[]<>]>[<[]<>><<>()>]>({{<>{}}})]{(<<<>{}>{{}{}}><(()[])[{}{}]>)}><<[{[()[]]{
{[[{([[<<[[[{[()[]]{<>()}}({<><>})]{((<>[])[<>()])}]<(([[][]]<()[]>)){<({}<>)(<>{}}>{(<>{})(<><>)}}>]{([{[<><
[([[<[<({[{(([()()]{{}[]})[([]())(()())])[{{[]()}[<>{}]}({{}[]}[<>()])]}]<([<({}[]){[]()}>(<()()>[()<>])][(
<(<({{<(([[([[<>()]((){})]{(<>){<>[]}})[((<><>)({}{}))]]([<[{}[]]{[]<>}]][{<(){}><[]<>>}<[{}[
{[[({<[[{[({<([][]){<>()}>}(<(()()){()<>}>{<<>{}>}))<{<<()[]><{}<>>><({}<>)({}())>}((({}{})
(<(<({<<(<{[[<<>[]>({}{})][<[]()>{()()}]]}({{{<>[]}[<>{}]}({(){}}<()[]>)}}>)>{{{[({[[]()][[]{}]}(<<>[]>)){
({{{<(({[{{{{[{}<>][()<>]}<{()<>}>}[[({}())<[]()>][[<>[]]({}())]]}[[([{}()]({}{}))<([]())>]<{<{}[]>
[{([({<{(<[({{()()}(()<>)}(({}<>)<[]{}>)){([[][]]<(){}>)}]<<<<<>()><{}<>>>[((){})[[]{}]]><{<[]{}>>>>>)[(
{[(<({[<{<{{<{<>()}({}[])>(<{}[]>[<>()])}[[<[]<>>({})]{<<>{}><()[]>}]}>}[{{<{([]())[()()]}([[][]][
{[{{{{<<<{<(([[][]]){{[]{}}({}{})})[([()()]{[]()}){([]{})<{}[]>}]>[<(<[][]>{[]<>})[{{}()}(<>(
<[({{([[([{({{{}{}}<{}[]>}([(){}][<>{}]))}<{<[<>[]][[]<>]>[([][])]}([(<>{})[[][]]])>][{[{([]{})[[]<
<{{{<(([({{({<{}<>>[()()]}(([]){{}}))}}[(({{[]()}<{}<>>}[{[][]}<[]{}>])[<[()()](()())><(()){<>{}}>])[{<{[]<>}
{(<[{{[((<[[[[()()]([][])]([<>{}][<>()])]]>))<{(<<<([]{}){(){}}><<{}>{[][]}>>>{{(<<>>[(){}])<[<>()]{
{[{({{(<{({<({<>}<[][]>)([[]{}]{[][]})>[{(()())(()<>)}]][<[<()[]><{}{}>]({<>[]}<{}[]>)>[{<{}{}>[{}{
[{<{<({<<{[<((()<>)[{}()]){(<><>)<()<>>}>{(([]<>)[[]<>])<{()}[<><>]>}]}({[{{{}<>}({}())>(<{}<>>{{}()})][<
((<[{[[<[<(([(()[])<[]{}>](({}<>){<>[]}))<((()[])({}())){{()[]}[()<>]}>)[[((<>[])[<>()])[{{}<>}[{}{}]]]]><
[{<({{(([([[<<()()><<><>>>[<()[]>([]<>)]]{[{()<>}]((()[]){{}{}})}])[({[([]<>)][[<>[]]<{}{}>]}{[[[]
(<{(([{{<[([[<()<>>(<>)]<([])[(){}]>]){{[<[]<>>{{}{}}]}({[{}]}[{()[]}{{}<>}])}]>{<<{{<(){}>({}{}
({{(<{{[[<{<[{{}{}}{<>[]}][(<>{}>(()<>)]>}[{<{{}<>}><{()<>}<[]()>>}]>({[{{{}{}}<{}{}>}(((){})[[]<>])]({<[][]>
";

$lines = preg_split("/\r?\n/", trim($input));

function solvePart1($lines) {
  $answer = 0;
  $opens = ["(", "[", "{", "<"];
  $closes = [")", "]", "}", ">"];
  
  $stack = [];
  $i = 0;
  foreach ($lines as $line) {
    $i++;
    $parts = str_split($line);
    $stop = false;

    foreach ($parts as $part) {
      if (in_array($part, $opens))
      {
        array_push($stack, $part);
      }
      elseif (in_array($part, $closes))
      {
        $popped = array_pop($stack);
        $error = 0;
        if ($part === ")" && $popped !== "(") $error = 3;
        if ($part === "]" && $popped !== "[") $error = 57;
        if ($part === "}" && $popped !== "{") $error = 1197;
        if ($part === ">" && $popped !== "<") $error = 25137;

        if ($error) {
          // echo "Expected matching for $part but found $popped on line $i => $line\n";
          $answer += $error;
          break;
        }
      }
      else
      {
        throw new Error("Unexpected bracket part: " . $part);
      }

      if ($stop) break;
    }
  }

  return $answer;
}

function solvePart2($lines) {
  $answer = 0;
  $opens = ["(", "[", "{", "<"];
  $closes = [")", "]", "}", ">"];
  $scores = [];
  $i = 0;

  foreach ($lines as $line) {
    $i++;
    $parts = str_split($line);
    $stop = false;
    $stack = [];
    $error = 0;

    foreach ($parts as $part) {
      if (in_array($part, $opens))
      {
        array_push($stack, $part);
      }
      elseif (in_array($part, $closes))
      {
        $popped = array_pop($stack);
        if ($part === ")" && $popped !== "(") $error = 3;
        if ($part === "]" && $popped !== "[") $error = 57;
        if ($part === "}" && $popped !== "{") $error = 1197;
        if ($part === ">" && $popped !== "<") $error = 25137;

        if ($error) {
          break;
        }
      }
      else
      {
        throw new Error("Unexpected bracket part: " . $part);
      }

      if ($stop) break;
    }

    if (!$error) {
      echo "Valid line $i => $line with stack " . implode("", $stack) . "\n";
      $score = 0;
      while ($popped = array_pop($stack)) {
        $score *= 5;
        if ($popped === "(") $score += 1;
        if ($popped === "[") $score += 2;
        if ($popped === "{") $score += 3;
        if ($popped === "<") $score += 4;
      }
      array_push($scores, $score);
    }
  }

  print_r($scores);
  sort($scores);
  $idx = floor(count($scores) / 2);
  return $scores[$idx];
}

echo "Solution 1: " . solvePart1($lines) . "\n";
echo "Solution 2: " . solvePart2($lines) . "\n";