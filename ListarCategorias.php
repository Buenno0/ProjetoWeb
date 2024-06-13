<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="IMG/favicon.ico">
    <link rel="stylesheet" href="estilos/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<?php
    require "sessaoAdm.php";
    require "conexao.php";

    $comando = "SELECT categorias.*, COUNT(produtos.categoria_id) AS num_produtos FROM categorias LEFT JOIN produtos ON categorias.categoria_id = produtos.categoria_id GROUP BY categorias.categoria_id";
    $result = mysqli_query($conexao, $comando);
    $registros = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>
  
  <div class="categoriaClass">
    <h2 class="h2Categoria"><a href="dashboard.php">Dashboard do adm</a></h2>
    <h2 class="h2Categoria"><a href="usuarioListarTodos.php">Ver usuarios</a></h2>
    <h2 class="h2Categoria"><a href="categoria.php">Adicionar categoria</a></h2>
    <h2 class="h2Categoria"><a href="produtoFormulario.php">Adiconar produto</a></h2>
   
  </div>
  <br>
  <div class="tabelaProd">
    <h2 class="h2Categoria">Id</h2>
    
    <br>
    <h2 class="h2Categoria">Categoria</h2>
   
    <h2 class="h2Categoria"> Produtos Cadastrados</h2>
    <br>
    <h2 class="h2Categoria">Ações</h2>
    <br>
</div>
<div class="flex-containerCateg">
    <?php foreach ($registros as $registro): ?>
        <div class="prod-editar">
            <h3 class="h3LCateg"><?= $registro["categoria_id"] ?></h3>
            <div class="produt-text">
              
                <h3 class="h3LCateg"><?= $registro["nome"] ?></h3>
                
                <h3 class="h3LCateg"><?= $registro["num_produtos"] ?></h3> 
            </div>
            <div class="botao-fim">
                <a class="editar-button" href="categoriaListarUM.php?categoria_id=<?= $registro["categoria_id"] ?>">Ver Categoria</a>
                <a class="editar-button" href="editarCategoria.php?categoria_id=<?= $registro["categoria_id"] ?>">Editar</a>
                <a class="editar-button" href="deletarCategoria.php?categoria_id=<?= $registro["categoria_id"] ?>" onclick="return confirmAcao()">Remover categoria</a>
            </div>
        </div>
    <?php endforeach ?>
</div>
  <script>
    function confirmAcao() {
      var confirmacao = window.confirm("Você tem certeza de que deseja remover esta categoria? Esta ação não poderá ser desfeita.");
      return confirmacao; 
    }
  </script>
        </div>
</body>
</html>
