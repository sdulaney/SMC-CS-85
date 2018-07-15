<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laptop Order Form</title>
</head>
<body>

    <form action="order_confirmation.php" method="post">
        <h1>Laptop Order Form</h1>
        <fieldset>
            <legend>Laptop Model</legend>
            <p>
                <label for="macbook_pro_qty">
                    Apple MacBook Pro 2018
                </label>
                <input type="text" id="macbook_pro_qty" name="macbook_pro_qty" placeholder="Qty" />
            </p>
            <p>
                <label for="surface_pro_qty">
                    Microsoft Surface Pro
                </label>
                <input type="text" id="surface_pro_qty" name="surface_pro_qty" placeholder="Qty" />
            </p>
            <p>
                <label for="pixelbook_qty">
                    Google Pixelbook
                </label>
                <input type="text" id="pixelbook_qty" name="pixelbook_qty" placeholder="Qty" />
            </p>
            <p>
                <label for="xps_qty">
                    Dell XPS 15
                </label>
                <input type="text" id="xps_qty" name="xps_qty" placeholder="Qty" />
            </p>
            <p>
                <label for="spectre_x360_qty">
                    HP Spectre x360
                </label>
                <input type="text" id="spectre_x360_qty" name="spectre_x360_qty" placeholder="Qty" />
            </p>
            <p>
                <label for="thinkpad_e470_qty">
                    Lenovo ThinkPad E470
                </label>
                <input type="text" id="thinkpad_e470_qty" name="thinkpad_e470_qty" placeholder="Qty" />
            </p>
        </fieldset>
        <p>
            <button type="submit">
                Continue
            </button>
        </p>
    </form>

</body>
</html>