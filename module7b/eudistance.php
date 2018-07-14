<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Distance Between European Capitals Calculator</title>
</head>
<body>

    <h1>Distance Between European Capitals Calculator</h1>

<?php

    // Array of European cities and the distances between them in kilometers.
    $Distances = array(
        "Berlin" => array("Berlin" => 0, "Moscow" => 1607.99, "Paris" => 876.96, "Prague" => 280.34, "Rome" => 1181.67),
        "Moscow" => array("Berlin" => 1607.99, "Moscow" => 0, "Paris" => 2484.92, "Prague" => 1664.04, "Rome" => 2374.26),
        "Paris" => array("Berlin" => 876.96, "Moscow" => 641.31, "Paris" => 0, "Prague" => 885.38, "Rome" => 1105.76),
        "Prague" => array("Berlin" => 280.34, "Moscow" => 1664.04, "Paris" => 885.38, "Prague" => 0, "Rome" => 922),
        "Rome" => array("Berlin" => 1181.67, "Moscow" => 2374.26, "Paris" => 1105.76, "Prague" => 922, "Rome" => 0)
    );
    $KMtoMiles = 0.62;

    /*
     * Displays a form that calculates the distance between European capitals in kilometers.
     */
    function displayForm() {

?>

    <form action="eudistance.php" method="post">
        <p>From Capital:<input type="text" name="from_capital" /></p>
        <p>To Capital:<input type="text" name="to_capital" /></p>
        <p><input type="reset" value="Clear Form" /></p>
        <p><input type="submit" name="Submit" value="Calculate" /></p>
    </form>
        
<?php

    }

    /*
     * Returns the distance in kilometers between two European capitals using the global two-dimensional
     * associative array $Distances.
     */
    function calculateDistance($fromCapital, $toCapital) {
        return($GLOBALS['Distances'][$fromCapital][$toCapital]);
    }

    if (!empty($_POST['from_capital']) && !empty($_POST['to_capital'])) {
        echo "<p>The distance from " . $_POST['from_capital'] . " to " . $_POST['to_capital'] . " is: " . calculateDistance($_POST['from_capital'], $_POST['to_capital']) . " km.</p>";
    } elseif (empty($_POST['to_capital']) && !empty($_POST['from_capital'])) {
        echo "<p>\"To Capital\" is a required field. Please try again.</p>\n";
        displayForm();
    } elseif (!empty($_POST['to_capital']) && empty($_POST['from_capital'])) {
        echo "<p>\"From Capital\" is a required field. Please try again.</p>\n";
        displayForm();
    } else {
        displayForm();
    }

?>

</body>
</html>