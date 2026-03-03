<?php
/*
=====================================================
        ADVANCED NUMBER SYSTEM PRACTICAL
=====================================================
Checks:
- Natural Number
- Whole Number
- Integer
- Rational Number
- Irrational Number
- Even / Odd
- Prime / Composite
=====================================================
*/

// ---------- FUNCTIONS ----------

// Check if integer
function isIntegerNumber($num) {
    return is_numeric($num) && floor($num) == $num;
}

// Natural number (1,2,3...)
function isNatural($num) {
    return isIntegerNumber($num) && $num > 0;
}

// Whole number (0,1,2...)
function isWhole($num) {
    return isIntegerNumber($num) && $num >= 0;
}

// Rational number (any numeric value in PHP)
function isRational($num) {
    return is_numeric($num);
}

// Irrational number (approx check using sqrt input format)
function isIrrationalInput($input) {
    // If user types something like sqrt(2)
    return strpos($input, "sqrt") !== false;
}

// Prime number
function isPrimeNumber($num) {

    if (!isNatural($num) || $num == 1) {
        return false;
    }

    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }

    return true;
}

$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $input = trim($_POST["number"]);

    if ($input == "") {
        $result = "<div class='alert alert-danger'>Please enter a number.</div>";
    } else {

        $number = is_numeric($input) ? $input + 0 : null;

        $result .= "<div class='card p-3 mt-3'>";
        $result .= "<h5>Results:</h5><ul>";

        // Natural
        $result .= "<li>Natural Number: " . (isNatural($number) ? "Yes" : "No") . "</li>";

        // Whole
        $result .= "<li>Whole Number: " . (isWhole($number) ? "Yes" : "No") . "</li>";

        // Integer
        $result .= "<li>Integer: " . (isIntegerNumber($number) ? "Yes" : "No") . "</li>";

        // Rational
        $result .= "<li>Rational Number: " . (isRational($number) ? "Yes" : "No") . "</li>";

        // Irrational
        $result .= "<li>Irrational Number: " . (isIrrationalInput($input) ? "Yes" : "No") . "</li>";

        // Even / Odd
        if (isIntegerNumber($number)) {
            $result .= "<li>Even / Odd: " . ($number % 2 == 0 ? "Even" : "Odd") . "</li>";
        } else {
            $result .= "<li>Even / Odd: Not Applicable</li>";
        }

        // Prime / Composite
        if (isNatural($number) && $number > 1) {
            $result .= "<li>Prime / Composite: " . (isPrimeNumber($number) ? "Prime" : "Composite") . "</li>";
        } else {
            $result .= "<li>Prime / Composite: Not Applicable</li>";
        }

        $result .= "</ul></div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Advanced Number Practical</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="mb-3">Number System Practical</h3>

        <form method="post">
            <div class="mb-3">
                <label class="form-label">Enter a Number</label>
                <input type="text" name="number" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Check Number</button>
        </form>

        <?php echo $result; ?>
    </div>
</div>

</body>
</html>