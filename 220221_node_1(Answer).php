<?php

//Function to calculate each even-digit & odd-digit number and calculate the sum
function calculateFitValue($cardNumber) {
    $evenSum = 0;
    $oddSum = 0;

    for ($i = 15; $i >= 0; $i--) {
        $digit = intval($cardNumber[$i]);
        
        if ($i % 2 == 0) { // to get Even-digit
            $doubleDigit = $digit * 2;
            $evenSum += ($doubleDigit > 9) ? ($doubleDigit - 9) : $doubleDigit;
        } else { // to get Odd-digit
            $oddSum += $digit;
        }

    }
    $totalSum = $evenSum + $oddSum;
    $result = (10 - ($totalSum % 10)) % 10;
    return $result;
}

$input = trim(fgets(STDIN));
while (($input = fgets(STDIN)) !== false) {
    if(strpos($input, 'X') !== false){         
        $result = calculateFitValue($input);   
        echo $result . "\n";     
    }
}
?>