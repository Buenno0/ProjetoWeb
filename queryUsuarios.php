<?php
require "conexao.php";
$usuario_id = $_GET["id"];

$comando = "SELECT *
        FROM usuarios u
        LEFT JOIN enderecos e ON u.id = e.usuario_id
        WHERE u.id = $usuario_id";

$result = $conexao->query($comando); 
$dadosUsuario = array();
$enderecos = array(); 

while ($row = $result->fetch_assoc()) {
    $dadosUsuario = array(
        "id" => $row['id'],
        "nome" => $row['nome'],
        "email" => $row['email'],
        "cpf" => $row['cpf'],
        "dtNasc" => $row['dtNasc'],
        "senha" => $row['senha']
    );

    $endereco = array(
        "id" => $row['id'],
        "rua" => $row['rua'],
        "numero" => $row['numero'],
        "cidade" => $row['cidade'],
        "estado" => $row['estado'],
        "cep" => $row['cep']
    );
    $enderecos[] = $endereco;
}
?>
