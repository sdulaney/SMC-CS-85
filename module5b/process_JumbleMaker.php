<!DOCTYPE html>
<html>
<head>
    <title>Jumble Maker</title>
</head>
<body>

<?php

    /**
     * Displays the error message for a specified field.
     *
     * @param $fieldName
     * @param $errorMsg
     */
    function displayError($fieldName, $errorMsg) {
        echo "Error for field \"$fieldName\": $errorMsg\n";
    }

    /**
     * Validates and returns a word input by the user.
     *
     * If the input string $data is empty, contains a character that is not a letter, or is not between
     * 4 and 7 characters long, display an error message, increment the global error count, and return
     * the empty string. Otherwise, use the strtoupper() and str_shuffle() functions to make the string
     * all uppercase and randomly shuffle the characters. Then return the jumbled set of letters.
     *
     * @param $data
     * @param $fieldName
     * @return $data
     */
    function validateWord($data, $fieldName) {
        global $errorCount;
        if (empty($data)) {
            displayError($fieldName, "\"$fieldName\" is a required field.<br />");
            ++$errorCount;
            $data = "";
        } elseif (preg_match('/[^A-Za-z]/', $data)) {
            displayError($fieldName, "\"$fieldName\" must contain only letters.<br />");
            ++$errorCount;
            $data = "";
        } elseif (strlen($data) < 4 || strlen($data) > 7) {
            displayError($fieldName, "\"$fieldName\" must be between 4 and 7 characters long.<br />");
            ++$errorCount;
            $data = "";
        } else {
            $data = strtoupper($data);
            $data = str_shuffle($data);
        }
        return($data);
    }

    $errorCount = 0;
    $words = array();

    $words[] = validateWord($_POST['Word1'], "Word 1");
    $words[] = validateWord($_POST['Word2'], "Word 2");
    $words[] = validateWord($_POST['Word3'], "Word 3");
    $words[] = validateWord($_POST['Word4'], "Word 4");

    if ($errorCount > 0) {
        echo "Please use the \"Back\" button to re-enter the data.<br />\n";
    } else {
        $wordnum = 0;
        foreach ($words as $word) {
            echo "Word " . ++$wordnum . ": $word<br />\n";
        }
    }

?>

</body>
</html>