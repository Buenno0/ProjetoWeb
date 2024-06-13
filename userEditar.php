<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos/userEditar.css">
    <link rel="icon" type="image/x-icon" href="IMG/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>
<body>
    <?php
    require "sessaoAdm.php";
    require "conexao.php";

    $id = $_GET["id"];

    $comando = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = mysqli_query($conexao, $comando);
    $usuario = mysqli_fetch_assoc($resultado);
    ?>
    <h1>Editar usuário</h1>

    <form action="userAtualizar.php" method="post">
        Id
    <input type="text" name="id" value="<?=$usuario["id"]?>" readonly>
        <br>
        Nome <input type="text" name="nome" value="<?=$usuario["nome"]?>">
        <br>
        Email <input type="email" name="email" value="<?=$usuario["email"]?>">
        <br>
        CPF <input type="number" name="cpf" value="<?=$usuario["cpf"]?>">
        <br>
        Senha <input type="password" name="senha" value="<?=$usuario["senha"]?>">
        <br>
        Data de Nascimento <input type="date" name="dtNasc" value="<?=$usuario["dtNasc"]?>">
        <button type="submit">Atualizar usuário</button>
    </form>
</body>
</html>
