<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show Guest Book</title>
</head>
<body>

<?php

    $file = "guestbook.txt";
    if (file_exists($file)) {
        if (is_readable($file)) {
            echo "<pre>" . file_get_contents($file) . "</pre>\n";
        } else {
            echo "<p>$file is not readable.</p>\n";
        }
    }

?>

</body>
</html>