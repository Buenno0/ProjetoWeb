<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Inserção de Categoria</title>
    <link rel="icon" type="image/x-icon" href="IMG/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="estilos/main.css">
</head>
<body class="cateBody">
    <?php require "sessaoAdm.php"; ?>
    <h2 class="h2fCateg"> Inserção de Categoria</h2>
    <form class="formCateg" action="adicionarCategoria.php" method="post">
        <label class="labelCateg" for="nome">Nome da Categoria:</label>
        <input class="inputCateg" type="text" name="nome" id="nome" required>
        
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" maxlength="400" rows="4" cols="50"></textarea>
        
        <input class="inputCateg" type="submit" value="Inserir Categoria">
    </form>
</body>
</html>
