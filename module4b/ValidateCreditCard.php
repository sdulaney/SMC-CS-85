<!DOCTYPE html>
<html>
<head>
    <title>Validate Credit Card</title>
</head>
<body>

    <h1>Validate Credit Card</h1>
    <hr />

<?php

    $CreditCard = array( "", "8910-1234-5678-6543", "OOOO-9123-4567-0123");

    foreach ($CreditCard as $CardNumber) {
        if (empty($CardNumber)) {
            echo "<p>This Credit Card Number is invalid because it contains an empty string.</p>";
        } else {
            $CardNumber = str_replace("-", "", $CardNumber);
            $CardNumber = str_replace(" ", "", $CardNumber);
            if (!is_numeric($CardNumber)) {
                echo "<p>Warning! This Credit Card Number is invalid because it contains a non-numeric character.</p>";
            } elseif (empty($CardNumber)) {
                echo "<p>Warning! This Credit Card Number is invalid because it contains only dashes and spaces.</p>";
            } else {
                echo "<p>Credit Card Number: $CardNumber</p>";
            }
        }
    }

?>

</body>
</html>