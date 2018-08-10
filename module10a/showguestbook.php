<!DOCTYPE html>
<!-- Filename: showguestbook.php -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show Guest Book</title>
</head>
<body>

<?php

    $user = "sdulaney";
    $password = "p5U5TXdX";
    $host = "localhost";

    $DBConnect = mysqli_connect($host, $user, $password);
    /*
     * If mysqli_connect returns FALSE, output an error message. Otherwise, select the database, perform a
     * SELECT query, and close the database connection.
     */
    if ($DBConnect === FALSE) {
        echo "<p>Unable to connect to the database server.</p>" . "<p>Error code " . mysqli_errno() . ": " . mysqli_error() . "</p>";
    } else {
        $DBName = "sdulaney_module10a";
        /*
         * If mysqli_select_db returns FALSE, output a message indicating there are no entries in the guest book.
         */
        if (!mysqli_select_db($DBConnect, $DBName)) {
            echo "<p>There are no entries in the guest book!</p>";
        } else {
            $TableName = "visitors";
            $SQLstring = "SELECT * FROM $TableName";
            $QueryResult = mysqli_query($DBConnect, $SQLstring);
            /*
             * If the number of rows in the mysqli_result object is zero for the SELECT SQL statement, output a
             * message indicating there are no entries in the guest book. Otherwise, output the guest book entries
             * in an HTML table. Then free the memory associated with the mysqli_result object.
             */
            if (mysqli_num_rows($QueryResult) == 0) {
                echo "<p>There are no entries in the guest book!</p>";
            } else {
                echo "<p>The following visitors have signed our guest book:</p>";
                echo "<table width='100%' border='1'>";
                echo "<tr><th>First Name</th><th>Last Name</th></tr>";
                while ($Row = mysqli_fetch_array($QueryResult)) {
                    echo "<tr><td>{$Row['first_name']}</td>";
                    echo "<td>{$Row['last_name']}</td></tr>";
                }
            }
            mysqli_free_result($QueryResult);
        }
        mysqli_close($DBConnect);
    }

?>

</body>
</html>