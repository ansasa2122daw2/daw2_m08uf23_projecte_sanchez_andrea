<?php
session_start();
session_unset();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
        );
}
session_destroy();
header("Location: http://zend-ansasa.fjeclot.net/daw2_m08uf23_projecte_sanchez_andrea/index.php");
?>