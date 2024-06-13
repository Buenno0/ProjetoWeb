<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Inserção de Categoria</title>
    <link rel="icon" type="image/x-icon" href="IMG/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="estilos/main.css">
</head>
<body class="cateBody">
<?php
    require "sessaoAdm.php";
    require "conexao.php";

   $id = $_GET["categoria_id"];

    $comando = "SELECT * FROM categorias WHERE categoria_id = $id";
    $resultado = mysqli_query($conexao, $comando);
    $categoria = mysqli_fetch_assoc($resultado);
    ?>
    <h2 class="h2fCateg"> edição de Categoria</h2>
    <form class="formCateg" action="inserir_categoria.php" method="post">
        <label class="labelCateg" for="id">Id:</label>
        <input class="inputCateg" type="number" name="id" value="<?=$id?>" readonly>
        <label class="labelCateg" for="nome">Nome da Categoria:</label>
        <input class="inputCateg" type="text" name="nome" id="nome" value="<?=$categoria["nome"]?>"  required>
        
        <label class="labelCateg" for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" maxlength="400" rows="4" cols="50"><?=$categoria["descricao"]?></textarea>

        <input class="inputCateg" type="submit" value="Atualizar Categoria">
    </form>
</body>
</html>
