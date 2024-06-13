<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="icon" type="image/x-icon" href="IMG/favicon.ico">
    <link rel = "stylesheet" href="estilos/main.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <style>

        </style>
</head>
<body class="bodyProdEditar">
    <?php
    require "sessaoAdm.php";
    require "conexao.php";

    $id = $_GET["id"];

    $comando = "SELECT * FROM produtos WHERE id = $id";
    $resultado = mysqli_query($conexao, $comando);
    $produto = mysqli_fetch_assoc($resultado);
    ?>
    <h1 class="h1ProdEditar">Editar produto</h1>

    <form class="formProdEditar" action="produtoAtualizar.php" method="post" enctype="multipart/form-data">
    <input class="inputProdEditar" type="hidden" name="id" value="<?=$produto["id"]?>">
    <br>
    <br>
    Título <input class="inputProdEditar" type="text" name="titulo" value="<?=$produto["titulo"]?>">
    <br>
    <br>
    Descrição <textarea name="descricao" rows="4" cols="40"><?=$produto["descricao"]?></textarea>
    <br>
    <br>
    Preço <input class="inputProdEditar" type="text" name="preco" value="<?=$produto["preco"]?>">
    <br>
    <br>
    Quantidade em Estoque <input class="inputProdEditar" type="number" name="quantidade_estoque" value="<?=$produto["quantidade_estoque"]?>">
    <br>
    <br><label for="categoria">Categoria:</label>
    <select name="categoria" id="categoria">
        <?php
        require "conexao.php";
        

        $comando = "SELECT categoria_id, nome FROM categorias";
        $result = mysqli_query($conexao, $comando);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value=" . $row['categoria_id'] . ">" . $row['nome'] . "</option>";
            }
        } else {
            echo "<option value='0'>Nenhuma categoria encontrada</option>";
        }
        ?>
    </select><br><br>

<img class="imgProdEdit" src="<?= $produto["prodImg"] ?>">
<br>
    Atualizar imagem <input type="file" name="img">
    <br>
    <button type="submit">Atualizar Produto</button>
</form>

    <h1><a href="dashboard.php">Voltar</a></h1>
</body>
</html>
