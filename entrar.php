<?php
    session_start();
    $cpf = $_POST["cpf"];
    $senha = $_POST["senha"];

    if (empty($_POST) or empty($cpf) or empty($senha)) {
        die("Acesso não autorizado");
    }

    require "conexao.php";

    $comando = "SELECT * FROM usuarios WHERE cpf = '$cpf' AND senha = '$senha'";

    $res = $conexao->query($comando) or die($conexao->error);

    $row = $res->fetch_object();

    $qtd = $res->num_rows;

    if ($qtd > 0) {
        
        $nome_usuario = $row->nome;

        if ($row->tipo_usuario === 'comum') {
            
            $_SESSION['tipo_usuario'] = 'comum';
            $_SESSION['id_usuario'] = $row->id;
            $_SESSION['nome_usuario'] = $nome_usuario; 
            header("Location: index.php");
            exit();

        } elseif ($row->tipo_usuario === 'adm') {

            $_SESSION['tipo_usuario'] = 'adm';
            $_SESSION['id_usuario'] = $row->id;
            $_SESSION['nome_usuario'] = $nome_usuario; 
            header("Location: dashboard.php");
            exit();
        }
    }

echo "<script>alert('CPF ou senha incorretos!');</script>";
header("refresh:0;url=login.php");
exit();
