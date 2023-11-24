<?php

// Function to flip coins
function flipCoins(&$coins, $start, $end) {
    for ($i = $start; $i <= $end; $i++) {
        $coins[$i] = ($coins[$i] == 'b') ? 'w' : 'b';
    }
}

// Function to count the number of black coins
function countBlackCoins($coins) {
    return substr_count($coins, 'b');
}

// Function to calculate the result
function calculateResult($n, $coins) {
    $flipped = false;
    for ($i = 0; $i < $n - 1; $i++) {
        if ($coins[$i] == 'b' && $coins[$i + 1] == 'w' || $coins[$i] == 'w' && $coins[$i + 1] == 'b') {
            flipCoins($coins, $i, $i + 1);
            $flipped = true;
        } else {
            $flipped = false;
            continue;
        }
    }
    return countBlackCoins($coins);

}
$n = 0;
$input = trim(fgets(STDIN));
while (($input = fgets(STDIN)) !== false) {   
    if(strpos($input, 'b') !== false || strpos($input, 'w') !== false){   
        $result = calculateResult($n, $input);  
        echo $result . PHP_EOL;
    } else {
        $n = intval($input);
    }
}

?>