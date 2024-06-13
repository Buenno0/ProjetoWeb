<?php
    session_start();

    if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'adm') {
        header("location: erro.php");
    }
?>
