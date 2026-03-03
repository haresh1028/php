<?php
/*
=====================================================
        SERIES BASED LOGICAL PROGRAMS
=====================================================
Includes:
- Fibonacci Series
- Arithmetic Progression (AP)
- Geometric Progression (GP)
- Prime Series
- Odd Series
- Even Series
- Square Series
- Cube Series
=====================================================
*/

$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $n = (int)$_POST["limit"];

    if ($n <= 0) {
        $result = "Please enter a positive number.";
    } else {

        $result .= "<h3>Results for first $n terms:</h3>";

        // 1. Fibonacci Series
        $a = 0;
        $b = 1;
        $result .= "<strong>Fibonacci Series:</strong><br>";
        for ($i = 1; $i <= $n; $i++) {
            $result .= $a . " ";
            $next = $a + $b;
            $a = $b;
            $b = $next;
        }

        // 2. Arithmetic Progression (AP)
        $result .= "<br><br><strong>Arithmetic Progression (Start=2, Diff=3):</strong><br>";
        $start = 2;
        $diff = 3;
        for ($i = 0; $i < $n; $i++) {
            $result .= ($start + $i * $diff) . " ";
        }

        // 3. Geometric Progression (GP)
        $result .= "<br><br><strong>Geometric Progression (Start=2, Ratio=2):</strong><br>";
        $term = 2;
        for ($i = 0; $i < $n; $i++) {
            $result .= $term . " ";
            $term *= 2;
        }

        // 4. Prime Number Series
        $result .= "<br><br><strong>Prime Number Series:</strong><br>";
        $count = 0;
        $num = 2;
        while ($count < $n) {
            $isPrime = true;
            for ($i = 2; $i <= sqrt($num); $i++) {
                if ($num % $i == 0) {
                    $isPrime = false;
                    break;
                }
            }
            if ($isPrime) {
                $result .= $num . " ";
                $count++;
            }
            $num++;
        }

        // 5. Odd Number Series
        $result .= "<br><br><strong>Odd Number Series:</strong><br>";
        for ($i = 1; $i <= $n * 2; $i += 2) {
            $result .= $i . " ";
        }

        // 6. Even Number Series
        $result .= "<br><br><strong>Even Number Series:</strong><br>";
        for ($i = 2; $i <= $n * 2; $i += 2) {
            $result .= $i . " ";
        }

        // 7. Square Number Series
        $result .= "<br><br><strong>Square Number Series:</strong><br>";
        for ($i = 1; $i <= $n; $i++) {
            $result .= ($i * $i) . " ";
        }

        // 8. Cube Number Series
        $result .= "<br><br><strong>Cube Number Series:</strong><br>";
        for ($i = 1; $i <= $n; $i++) {
            $result .= ($i * $i * $i) . " ";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Series Logical Practical</title>
</head>
<body>

<h2>Series-Based Logical Programs</h2>

<form method="post">
    Enter number of terms:
    <input type="number" name="limit" required>
    <button type="submit">Generate</button>
</form>

<br>
<?php echo $result; ?>

</body>
</html>