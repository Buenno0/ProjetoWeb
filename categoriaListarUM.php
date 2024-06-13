<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="IMG/favicon.ico">
    <link rel="stylesheet" href="estilos/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Categoria</title>
</head>
<body class="bodyCatListarUm">
    <?php
    require "sessaoAdm.php";
    require "conexao.php";

    $id = $_GET["categoria_id"];

    $comando = "SELECT categorias.*, COUNT(produtos.categoria_id) AS num_produtos FROM categorias LEFT JOIN produtos ON categorias.categoria_id = produtos.categoria_id WHERE categorias.categoria_id = $id GROUP BY categorias.categoria_id";
    $resultado = mysqli_query($conexao, $comando);

    $reg = mysqli_fetch_assoc($resultado);

    $nome = $reg["nome"];
    $descricao = $reg["descricao"];
    $data = $reg["data_criacao"]; 
    $num_produtos = $reg["num_produtos"]; 

    ?>

    <div class="categoriaListarUm">
        <h2 class="h2ListarUm"><a href="dashboard.php">Dashboard do adm</a></h2>
        <h2 class="h2ListarUm"><a href="ListarCategorias.php">Ver categorias</a></h2>
        <h2 class="h2ListarUm"><a href="categoria.php">Adicionar categoria</a></h2>
    </div>

    <br>

    <div class="containerCateListarUm">
        <h1 class="h1ListarUm"><?=$nome?></h1>
        <br>
        <div class="info">
            <p class="pListarUm"><strong>ID:</strong> <?=$id?></p>
            <p class="pListarUm"><strong>Data de criação:</strong> <?=$data?></p> 
            <p class="pListarUm"><strong>Descrição:</strong> <?=$descricao?></p>
            <p class="pListarUm"><strong>Produtos cadastrados:</strong> <?=$num_produtos?></p> 
        </div>

        <div class="fim">
            <h1 class="h1ListarUm"><a href="ListarCategorias.php">Voltar</a></h1>
            <h1 class="h1ListarUm"><a href="editarCategoria.php?categoria_id=<?=$id ?>">Editar categoria</a></h1>
            <h1 class="h1ListarUm"><a href="deletarCategoria.php?categoria_id=<?=$id?>" onclick="confirmAcao()">Remover categoria</a></h1>
        </div>

        <script>
    function confirmAcao() {
        var confirmacao = window.confirm("Você tem certeza de que deseja remover esta categoria? Esta ação não poderá ser desfeita.");
        if (confirmacao) {
            window.location.href = "deletarCategoria.php?categoria_id=<?=$id?>";
        }
    }
</script>

    </div>
</body>
</html>
