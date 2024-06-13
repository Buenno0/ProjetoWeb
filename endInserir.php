<?php require "funcao/validarEndereco.php";
    
    $usuario_id = $_GET["id"];

    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $numero_apartamento = $_POST['numero_apartamento'];
    $bloco = $_POST['bloco'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    
    $cep = validarEndereco($rua, $cidade, $estado, $cep);

    $endereco_comando = "INSERT INTO enderecos (usuario_id, rua, numero, numero_apartamento, bloco, cidade, estado, cep) VALUES ('$usuario_id', '$rua', '$numero', '$numero_apartamento', '$bloco', '$cidade', '$estado', '$cep')";
    
    $endereco_result = mysqli_query($conexao, $endereco_comando);

    if ($endereco_result == true) {
        echo "<h1>Cadastro de usuário e endereço feito com sucesso!</h1>";
        header ("location: userListarUM.php?id=$usuario_id");
    } else {
        die("<h1>Erro ao inserir endereço:</h1>" . mysqli_error($conexao));
    }