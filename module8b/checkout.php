<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Order is Now Complete</title>
</head>
<body>

    <h1>Your Order is Now Complete</h1>

<?php

    // Initialize the session
    session_start();
    // Unset all of the session variables
    $_SESSION = array();
    // Delete the session cookie
    // Source: http://php.net/manual/en/function.session-destroy.php
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    // Destroy the session
    session_destroy();

?>

</body>
</html>