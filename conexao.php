<?php
//$conexao = mysqli_connect("sql200.infinityfree.com", "if0_35153092", "iDieTuLSSU2", "if0_35153092_test");
$conexao = mysqli_connect("localhost", "root", "", "webloja");

if (!$conexao) {
    die("<h1>Conexão falghou </h1>". mysqli_connect_error());
}
?>