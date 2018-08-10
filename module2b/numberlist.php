<!DOCTYPE html>
<html>
<head>
    <title>Even Numbers</title>
    <meta charset="utf-8">
</head>
<body>

<?php

    $currentNumber = 1;
    while ($currentNumber <= 100) {
        if ($currentNumber % 2 == 0) {
            echo "<h2>", $currentNumber, "</h2>";
        }
        $currentNumber++;
    }

?>

</body>
</html>