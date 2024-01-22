<?php

session_start();
if ($_SESSION['authenticated'] !== true) {
    header("Location: /fanclub/auth.php", true, 307);
    exit();
}

?>