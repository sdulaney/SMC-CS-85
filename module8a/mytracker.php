<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Tracker</title>
</head>
<body>

<?php

    if (!isset($_COOKIE["viewCount"])) {
        setcookie("viewCount", 1,time()+60*60*24*365);
        echo "<p>Number of views: 1</p>";
    } else {
        setcookie("viewCount", ++$_COOKIE["viewCount"]);
        echo "<p>Number of views: " . $_COOKIE["viewCount"] . "</p>";
    }

    if ($_COOKIE["viewCount"] === 5) {
        echo "<p>Congratulations! You've now viewed this web page 5 times.</p>";
    } elseif ($_COOKIE["viewCount"] === 10) {
        echo "<p>Congratulations! You've now viewed this web page 10 times.</p>";
    } elseif ($_COOKIE["viewCount"] === 15) {
        echo "<p>Congratulations! You've now viewed this web page 15 times.</p>";
    } elseif ($_COOKIE["viewCount"] === 20) {
        setcookie("viewCount", "", time() - 3600);
    }

?>

</body>
</html>