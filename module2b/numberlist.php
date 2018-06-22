<!DOCTYPE html>
<html>
<head>
    <title>Even Numbers</title>
    <meta charset="utf-8">
</head>
<body>

<?php

    $n = 1;
    while ($n <= 100)
    {
        if ($n % 2 == 0)
        {
            echo ($n . "<br>");
        }
        $n++;
    }

?>

</body>
</html>