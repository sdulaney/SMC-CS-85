<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Bowler</title>
</head>
<body>

<?php

    if (empty($_POST['name']) || empty($_POST['age']) || empty($_POST['average'])) {
        echo "<p>You must enter your name, age, and average. Click your browser's back button to return to the registration form.</p>\n";
    } else {
        $name = addslashes($_POST['name']);
        $age = addslashes($_POST['age']);
        $average = addslashes($_POST['average']);
        $BowlerList = fopen("bowlerlist.txt", "ab");
        if (is_writeable("bowlerlist.txt")) {
            if (fwrite($BowlerList, $name . ", " . $age . ", " . $average . "\n")) {
                echo "<p>Thank you for signing up for our tournament!</p>\n";
            } else {
                echo "<p>Cannot register you for the tournament.</p>\n";
            }
        } else {
            echo "<p>Cannot write to the file.</p>\n";
            fclose($BowlerList);
        }
    }

?>

</body>
</html>