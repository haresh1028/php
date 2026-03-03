<?php

$a = 10;
$b = 20;

echo "before swap: a = $a, b = $b\n";

// swap without using a temporary variable
$a = $a + $b; // a now holds the sum of a and b
$b = $a - $b; // b now holds the original value of a
$a = $a - $b; // a now holds the original value of b

echo "after swap: a = $a, b = $b\n";

if (isset($_POST['swap'])) {
    $a = $_POST['num1'];
    $b = $_POST['num2'];

    echo '<h3>Before Swapping</h3>';
    echo 'Number 1 = ' . $a . '<br>';
    echo 'Number 2 = ' . $b . '<br>';

    // Swapping logic
    $temp = $a;
    $a = $b;
    $b = $temp;

    echo '<h3>After Swapping</h3>';
    echo 'Number 1 = ' . $a . '<br>';
    echo 'Number 2 = ' . $b;
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Swap Two Numbers</title>
</head>

<body>

    <h2>Swap Two Numbers</h2>

    <form method="post">
        Enter First Number:
        <input type="number" name="num1" required><br><br>

        Enter Second Number:
        <input type="number" name="num2" required><br><br>

        <input type="submit" name="swap" value="Swap Numbers">
    </form>

</body>

</html>
