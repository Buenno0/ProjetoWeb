<?php
session_start();
unset($_SESSION["carrinho"]);
//session_destroy();

header("Location: carrinho.php");