<?php
/*
=====================================================
        LOGICAL NUMBER PRACTICAL PROGRAM
=====================================================
Includes:
- Armstrong Number
- Palindrome Number
- Perfect Number
- Strong Number
- Automorphic Number
- Fibonacci Series
- GCD & LCM
- Factorial
=====================================================
*/

// ---------- FUNCTIONS ----------

// Armstrong Number
function isArmstrong($num) {
    $sum = 0;
    $temp = $num;
    $digits = strlen($num);

    while ($temp > 0) {
        $digit = $temp % 10;
        $sum += pow($digit, $digits);
        $temp = (int)($temp / 10);
    }

    return $sum == $num;
}

// Palindrome Number
function isPalindrome($num) {
    return $num == strrev($num);
}

// Perfect Number
function isPerfect($num) {
    $sum = 0;
    for ($i = 1; $i <= $num / 2; $i++) {
        if ($num % $i == 0) {
            $sum += $i;
        }
    }
    return $sum == $num;
}

// Strong Number (sum of factorial of digits)
function factorial($n) {
    $fact = 1;
    for ($i = 1; $i <= $n; $i++) {
        $fact *= $i;
    }
    return $fact;
}

function isStrong($num) {
    $sum = 0;
    $temp = $num;

    while ($temp > 0) {
        $digit = $temp % 10;
        $sum += factorial($digit);
        $temp = (int)($temp / 10);
    }

    return $sum == $num;
}

// Automorphic Number (square ends with same number)
function isAutomorphic($num) {
    $square = $num * $num;
    return substr($square, -strlen($num)) == $num;
}

// GCD
function findGCD($a, $b) {
    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}

// LCM
function findLCM($a, $b) {
    return ($a * $b) / findGCD($a, $b);
}

$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $num = (int)$_POST["number"];

    $result .= "<h3>Results:</h3>";

    $result .= "Armstrong: " . (isArmstrong($num) ? "Yes" : "No") . "<br>";
    $result .= "Palindrome: " . (isPalindrome($num) ? "Yes" : "No") . "<br>";
    $result .= "Perfect: " . (isPerfect($num) ? "Yes" : "No") . "<br>";
    $result .= "Strong: " . (isStrong($num) ? "Yes" : "No") . "<br>";
    $result .= "Automorphic: " . (isAutomorphic($num) ? "Yes" : "No") . "<br>";

    // Fibonacci (first 10 numbers)
    $result .= "<br><strong>First 10 Fibonacci Numbers:</strong><br>";
    $a = 0;
    $b = 1;
    for ($i = 1; $i <= 10; $i++) {
        $result .= $a . " ";
        $next = $a + $b;
        $a = $b;
        $b = $next;
    }

    // Factorial
    $result .= "<br><br>Factorial: " . factorial($num) . "<br>";

    // GCD & LCM example (with 12)
    $result .= "GCD with 12: " . findGCD($num, 12) . "<br>";
    $result .= "LCM with 12: " . findLCM($num, 12) . "<br>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logical Number Practical</title>
</head>
<body>

<h2>Logical Number Practical Program</h2>

<form method="post">
    Enter a Number:
    <input type="number" name="number" required>
    <button type="submit">Check</button>
</form>

<br>
<?php echo $result; ?>

</body>
</html>