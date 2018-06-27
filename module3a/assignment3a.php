<!DOCTYPE html>
<head>
    <title>Cost Per Square Foot Area Function</title>
</head>
<body>
<h2>Total Property Cost Calculator</h2>

<?php

    $length = 20;
    $width = 4;
    $ftCost = 75;

    //define rArea() function
    function rArea($l, $w) {
        return ($l * $w);
    }

    //call function rArea()
    echo "<p>A room of length " . $length . "ft and width " . $width . "ft has an area of " . rArea($length, $width) . ".</p>";

    //define totalCost() function
    function totalCost($l, $w, $cost) {
        return ($l * $w * $cost);
    }

    //call function totalCost()
    echo "<p>The total cost of a room of length " . $length . "ft and width " . $width . "ft area at $" . $ftCost  . " per square foot is $" . totalCost($length, $width, $ftCost) . ".</p>";

?>

</body>
</html>