<?php
session_start();

$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params["path"],
        $params["domain"], $params["secure"], $params["httponly"]
    );
}

session_destroy();
echo "You will be redirected in 2 sec.";
echo "<meta http-equiv=\"refresh\" content=\"2; URL=../\">";
?>