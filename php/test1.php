<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $max = 1;
    $min = 99;
    for ( $i = 1; $i <= 5; $i++) {
        $s = trim(fgets(STDIN));
        $s = intval(str_replace(array("\r\n","\r","\n"), '', $s));
        
        if($s < 1 || $s > 99) continue;
        
        if($min >= $s) {
            $min = $s;
        }
        
        if($max <= $s) {
            $max = $s;
        }
    }
    echo "$max\n$min\n"
?>
