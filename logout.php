<?php
   session_start();
        if (isset($_SESSION['tipo_usuario'])) {      
    $_SESSION = array();
    session_destroy();
    }
    header("Location: index.php");
        exit();
?>
