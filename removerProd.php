<?php
session_start();
    $idProduto = $_GET['id'];
    $indice = array_search($idProduto, $_SESSION['carrinho']);
        unset($_SESSION['carrinho'][$indice]);
        header("Location: carrinho.php");
        exit();
?>
