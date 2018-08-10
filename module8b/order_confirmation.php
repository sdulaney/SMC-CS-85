<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Review Your Order</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 15px;
        }
    </style>
</head>
<body>

    <h1>Review Your Order</h1>

<?php

    // Initialize the session
    session_start();
    // Use a session variable called cart to implement the shopping cart. It is an associative array
    // that has the order form field names as keys and quantities as values.
    $_SESSION["cart"] = array("macbook_pro_qty" => 0, "surface_pro_qty" => 0, "pixelbook_qty" => 0,
        "xps_qty" => 0, "spectre_x360_qty" => 0, "thinkpad_e470_qty" => 0);

    if (isset($_POST["macbook_pro_qty"])) {
        $_SESSION["cart"]["macbook_pro_qty"] = $_POST["macbook_pro_qty"];
    }
    if (isset($_POST["surface_pro_qty"])) {
        $_SESSION["cart"]["surface_pro_qty"] = $_POST["surface_pro_qty"];
    }
    if (isset($_POST["pixelbook_qty"])) {
        $_SESSION["cart"]["pixelbook_qty"] = $_POST["pixelbook_qty"];
    }
    if (isset($_POST["xps_qty"])) {
        $_SESSION["cart"]["xps_qty"] = $_POST["xps_qty"];
    }
    if (isset($_POST["spectre_x360_qty"])) {
        $_SESSION["cart"]["spectre_x360_qty"] = $_POST["spectre_x360_qty"];
    }
    if (isset($_POST["thinkpad_e470_qty"])) {
        $_SESSION["cart"]["thinkpad_e470_qty"] = $_POST["thinkpad_e470_qty"];
    }

    /*
     * Displays the contents of the order stored in a session variable called cart in an HTML table.
     */
    function displayOrder() {
        echo "<table>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                </tr>";
        foreach ($_SESSION["cart"] as $key => $value) {
            if ($value > 0) {
                $itemName = "";
                switch ($key) {
                    case "macbook_pro_qty":
                        $itemName = "Apple MacBook Pro 2018";
                        break;
                    case "surface_pro_qty":
                        $itemName = "Microsoft Surface Pro";
                        break;
                    case "pixelbook_qty":
                        $itemName = "Google Pixelbook";
                        break;
                    case "xps_qty":
                        $itemName = "Dell XPS 15";
                        break;
                    case "spectre_x360_qty":
                        $itemName = "HP Spectre x360";
                        break;
                    case "thinkpad_e470_qty":
                        $itemName = "Lenovo ThinkPad E470";
                        break;
                }
                echo "<tr>
                        <td>$itemName</td>
                        <td>$value</td>
                      </tr>";
            }
        }
        echo "</table>";
    }

    displayOrder();

?>

    <p><a href="checkout.php">Check Out</a></p>

</body>
</html>