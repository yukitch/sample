<?php

$l = trim(fgets(STDIN));
list($frame, $pin, $num) = array_map('intval', explode(' ', $l));

$l = str_replace('G', '0', trim(fgets(STDIN)));
$points = array_map('intval', explode(' ', $l));

$total = 0;
    $i = 0;

for($f=1;$f<$frame;$f++) {
    $point = 0;
    $point += $points[$i];
    //ストライク
    if($point === $pin) {
        $point += $points[$i+1];
        $point += $points[$i+2];
        $i++;
        $total += $point;
        continue;
    }
    $point += $points[++$i];
    //スペア
    if($point === $pin) {
        $point += $points[$i+1];
        $i++;
        $total += $point;
        continue;
    }
    $total += $point;
    $i++;
}
// 最終フレーム
$lp  = 0;
$lp += $points[$i]; 
//ストライク
if($lp === $pin) {
    $lp += 2 * $points[$i+1];
    //スペア
    if($lp === 3 * $pin) $lp += 3 * $points[$i+2];
    //倒れない
    else $lp += 2 * $points[$i+2];
}else{
    $lp += $points[++$i];
    //スペア
    if($lp === $pin) {
        $lp += 2 * $points[$i+1];
    }
}
$total += $lp;

echo "$total\n";

