<?php
/*
===========================================================
        ADVANCED NUMERIC & LOGICAL PRACTICAL FILE
===========================================================
Covers:

1. Financial & High-Precision Calculations (BCMath)
2. Number Formatting & Localization
3. Secure Random Number Generation
4. Advanced Array Numeric Operations
5. Type Safety and Conversion
6. Algorithmic Tasks:
   - Prime Number
   - Fibonacci Series
   - Factorial
   - Matrix Multiplication
===========================================================
*/

echo '<h2>Advanced Numeric Practical Questions & Solutions</h2>';

/* =========================================================
   1. Financial & High-Precision Calculations
   Question:
   Why does 0.1 + 0.2 sometimes give inaccurate results?
   Solve it using BCMath.
========================================================= */

echo '<h3>1. High-Precision Calculation (BCMath)</h3>';

// Floating-point issue
echo 'Normal PHP: ';
echo 0.1 + 0.2; // may output 0.30000000000004
echo '<br>Using BCMath: ';
echo bcadd('0.1', '0.2', 2); // exact 0.30
echo '<hr>';

/* =========================================================
   2. Number Formatting & Localization
   Question:
   Format 1234567.891 into proper currency format.
========================================================= */

echo '<h3>2. Number Formatting</h3>';
$number = 1234567.891;
echo number_format($number, 2, '.', ','); // 1,234,567.89
echo '<hr>';

/* =========================================================
   3. Secure Random Number Generation
   Question:
   Generate a secure 6-digit OTP.
========================================================= */

echo '<h3>3. Secure Random OTP</h3>';
$otp = random_int(100000, 999999);
echo "Generated OTP: $otp";
echo '<hr>';

/* =========================================================
   4. Advanced Array Numeric Operations
   Question:
   Given a dataset, calculate total and remove duplicates.
========================================================= */

echo '<h3>4. Array Numeric Operations</h3>';

$data = [10, 20, 30, 20, 40, 10];

echo 'Original Array: ';
print_r($data);

echo '<br>Total Sum: ' . array_sum($data);

$unique = array_unique($data);
echo '<br>Unique Values: ';
print_r($unique);

// Ensure all integers
$converted = array_map('intval', $data);
echo '<br>Converted to Integers: ';
print_r($converted);

echo '<hr>';

/* =========================================================
   5. Type Safety and Conversion
   Question:
   Validate user input as integer or float.
========================================================= */

echo '<h3>5. Type Safety</h3>';

$input = '123.45';

if (filter_var($input, FILTER_VALIDATE_INT) !== false) {
    echo 'Valid Integer';
} elseif (filter_var($input, FILTER_VALIDATE_FLOAT) !== false) {
    echo 'Valid Float';
} else {
    echo 'Invalid Number';
}

echo '<hr>';

/* =========================================================
   6. Algorithmic Tasks
========================================================= */

echo '<h3>6A. Prime Number Check</h3>';

function isPrime($num)
{
    if ($num <= 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

$primeTest = 29;
echo "$primeTest is " . (isPrime($primeTest) ? 'Prime' : 'Not Prime');

echo '<hr>';

echo '<h3>6B. Fibonacci Series (First 10 Terms)</h3>';

function fibonacci($n)
{
    $a = 0;
    $b = 1;
    for ($i = 0; $i < $n; $i++) {
        echo $a . ' ';
        $next = $a + $b;
        $a = $b;
        $b = $next;
    }
}

fibonacci(10);

echo '<hr>';

echo '<h3>6C. Factorial Calculation</h3>';

function factorial($n)
{
    $fact = 1;
    for ($i = 1; $i <= $n; $i++) {
        $fact *= $i;
    }
    return $fact;
}

$num = 5;
echo "Factorial of $num = " . factorial($num);

echo '<hr>';

echo '<h3>6D. Matrix Multiplication</h3>';

$A = [[1, 2], [3, 4]];

$B = [[5, 6], [7, 8]];

$result = [];

for ($i = 0; $i < 2; $i++) {
    for ($j = 0; $j < 2; $j++) {
        $result[$i][$j] = 0;
        for ($k = 0; $k < 2; $k++) {
            $result[$i][$j] += $A[$i][$k] * $B[$k][$j];
        }
    }
}

echo 'Result Matrix:<br>';
print_r($result);

echo '<hr>';

echo '<h3>Practical Completed Successfully</h3>';
?>
