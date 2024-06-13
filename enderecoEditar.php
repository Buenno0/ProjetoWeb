<!DOCTYPE html>
<html>
<head>
    <title> Editar Endereco</title>
    <link rel="icon" type="image/x-icon" href="IMG/favicon.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/main.css">
    
</head>
<body class="bodyForm">
<?php require "conexao.php";
    

   $id = $_GET["id"];

    $comando = "SELECT * FROM enderecos WHERE id = $id";
    $resultado = mysqli_query($conexao, $comando);
    $endereco = mysqli_fetch_assoc($resultado);
    ?>

    <h1 class="h1Log">Editar Endereço</h1>
    <div class="form-containerUser">
    <form action="enderecoAtualizar.php" method="post">

    <h1 class="h1Log">Endereço</h1>
    
    id
    <input type="number" name="id" value="<?=$id?>" readonly>

    <label for="rua">Rua:</label>
    <input type="text" id="rua" name="rua" value="<?= $endereco['rua'] ?>" required><br><br>

    <label for="numero">Número:</label>
    <input type="text" id="numero" name="numero" value="<?= $endereco['numero']; ?>" maxlength="10"><br><br>

    <label for="numero_apartamento">Número do Apartamento:</label>
    <input type="text" id="numero_apartamento" name="numero_apartamento" value="<?= $endereco['numero_apartamento']; ?>" maxlength="10"><br><br>

    <label for="bloco">Bloco:</label>
    <input type="text" id="bloco" name="bloco" value="<?= $endereco['bloco']; ?>" maxlength="20"><br><br>

    <label for="cidade">Cidade:</label>
    <input type="text" id="cidade" name="cidade" value="<?= $endereco['cidade']; ?>" required maxlength="50"><br><br>

    <label for="estado">Estado:</label>
    <input type="text" id="estado" name="estado" value="<?= $endereco['estado']; ?>" required maxlength="50"><br><br>

    <label for="cep">CEP:</label>
    <input type="text" id="cep" name="cep" value="<?= $endereco['cep']; ?>" required maxlength="8"><br><br>

    <input type="submit" value="Cadastrar">
</form>

</div>
<br>
<br>

</body>
</html>
