<!DOCTYPE html>
<html>
<head>
    <title>Compare Strings</title>
</head>
<body>

    <h1>Compare Strings</h1>
    <hr />

<?php

    $firstString = "Geek2Geek";
    $secondString = "Geezer2Geek";

    if (!empty($firstString) && !empty($secondString)) {
        if (strcmp($firstString, $secondString) === 0) {
            sameVar($firstString, $secondString);
        } else {
            diffVar($firstString, $secondString);
        }
    } else {
        echo "<p>Either the \$firstString variable or the \$secondString variable does not contain a value so the two strings cannot be compared. </p>";
    }

    function sameVar($var1,$var2) {
        echo "<p>string $var1 does match $var2</p>";
    }

    function diffVar($var1,$var2) {
        echo "<p>string $var1 does not match $var2</p>";
    }

?>

</body>
</html>