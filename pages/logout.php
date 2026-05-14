<?php
session_start();

// remove sessão
session_destroy();

// remove cookie
setcookie(
    "usuario",
    "",
    time() - 3600,
    "/"
);

header("Location: ../index.php");
exit;
?>