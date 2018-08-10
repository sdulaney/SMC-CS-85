<!DOCTYPE html>
<html>
<head>
    <title>Contact Me</title>
</head>
<body>

<?php

    /**
     * Validates and returns a string input by the user.
     *
     * If the input string $data is empty, display an error message, increment the global error count,
     * and return the empty string. Otherwise, strip the whitespace from the beginning and end of $data
     * and remove the backslashes. Then return the cleaned up string.
     *
     * @param string $data
     * @param string $fieldName
     * @return string $retval
     */
    function validateInput($data, $fieldName) {
        global $errorCount;
        if (empty($data)) {
            echo "\"$fieldName\" is a required field.<br />\n";
            ++$errorCount;
            $retval = "";
        }
        else {      // Only clean up the input if it isn't empty
            $retval = trim($data);
            $retval = stripslashes($retval);
        }
        return($retval);
    }

    /**
     * Validates and returns an email address input by the user.
     *
     * If the input email $data is empty, display an error message, increment the global error count,
     * and return the empty string. Otherwise, remove all illegal characters from the email. If the
     * resulting string is not a valid email, display an error message. Otherwise, return the cleaned
     * up email.
     *
     * @param string $data
     * @param string $fieldName
     * @return string $retval
     */
    function validateEmail($data, $fieldName) {
        global $errorCount;
        if (empty($data)) {
            echo "\"$fieldName\" is a required field.<br />\n";
            ++$errorCount;
            $retval = "";
        }
        else {      // Only clean up the input if it isn't empty
            $retval = filter_var($data, FILTER_SANITIZE_EMAIL);
            if (!filter_var($retval, FILTER_VALIDATE_EMAIL)) {
                echo "\"$fieldName\" is not a valid e-mail address.<br />\n";
            }
        }
        return($retval);
    }

    /**
     * Displays a contact form with sticky form functionality.
     *
     * This function takes one parameter for each form field and displays a contact form. The parameters
     * are used to implement sticky form functionality if the user submits the form incorrectly.
     *
     * @param string $Sender
     * @param string $Email
     * @param string $Subject
     * @param string $Message
     */
    function displayForm($Sender, $Email, $Subject, $Message) {
?>
        <h2 style="text-align:center">Contact Me</h2>
        <form name="contact" action="ContactForm.php" method="post">
            <p>Your Name:<input type="text" name="Sender" value="<?php echo $Sender; ?>" /></p>
            <p>Your E-mail:<input type="text" name="Email" value="<?php echo $Email; ?>" /></p>
            <p>Subject:<input type="text" name="Subject" value="<?php echo $Subject; ?>" /></p>
            <p>Message:<br /><textarea name="Message"><?php echo $Message; ?></textarea></p>
            <p><input type="reset" value="Clear Form" />&nbsp; &nbsp;<input type="submit" name="Submit" value="Send Form" /></p>
        </form>

<?php

    }

    $ShowForm = TRUE;
    $errorCount = 0;
    $Sender = "";
    $Email = "";
    $Subject = "";
    $Message = "";

    if (isset($_POST['Submit'])) {
        $Sender = validateInput($_POST['Sender'], "Your Name");
        $Email = validateEmail($_POST['Email'], "Your E-mail");
        $Subject = validateInput($_POST['Subject'], "Subject");
        $Message = validateInput($_POST['Message'], "Message");
        if ($errorCount == 0) {
            $ShowForm = FALSE;
        } else {
            $ShowForm = TRUE;
        }
    }

    if ($ShowForm == TRUE) {
        if ($errorCount > 0) {
            echo "<p>Please re-enter the form information below.</p>\n";
        }
        displayForm($Sender, $Email, $Subject, $Message);
    } else {
        $SenderAddress = "$Sender <$Email>";
        $Headers = "From: $SenderAddress\nCC: $SenderAddress\n";
        $result = mail("stewart@stewartdulaney.com", $Subject, $Message, $Headers);
        if ($result) {
            echo "<p>Your message has been sent. Thank you, " . $Sender . ".</p>\n";
        } else {
            echo "<p>There was an error sending your message, " . $Sender . ".</p>\n";
        }
    }

?>

</body>
</html>