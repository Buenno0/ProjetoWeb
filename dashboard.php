    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <link rel="icon" type="image/x-icon" href="IMG/favicon.ico">
       <link rel="stylesheet" href="estilos/main.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    </head>
       
    <?php
        require "sessaoAdm.php";
        require "conexao.php";
        $comando = "SELECT * FROM produtos";
        $result = mysqli_query($conexao, $comando);
        $registros = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $numRows = mysqli_num_rows($result);
        
        require "VetorAssociativo.php";
    ?>
      <a class="logout-button" href="logout.php">Logout</a>
      <div class="categoriaDash">
        <h2><a href="dashboard.php">Dashboard do adm</a></h2>
        <h2><a href="usuarioListarTodos.php">Ver usuarios</a></h2>
        <h2><a href="ListarCategorias.php">Ver categorias</a></h2>
        <h2><a href="categoria.php">Adicionar categoria</a></h2>
        <h2><a href="produtoFormulario.php">Adiconar Produto</a></h2>
      
      </div>
      <br>
      <h1 class="titulo-produtos"><strong> <?= $numRows ?></strong> Produtos Cadastrados:</h1>
   
    <div class="flex-containerDash">
    <?php foreach ($registros as $registro ): ?>

    <div class="prod-editarDash">
      
      <h3 class="dashH3">Id: <?= $registro["id"]?></h3>
        <img class="imgDash" src="<?= $registro["prodImg"] ?>" alt="produto">

        <div class="produt-textDash">
        
        <p class="pH3">Nome: <?= $registro["titulo"] ?></p>
        <h3 class="dashH3">Categoria: <?= isset($nomesCategorias[$registro["categoria_id"]]) ? $nomesCategorias[$registro["categoria_id"]] : "nenhuma" ?></h3>
     
      <h3 class="dashH3">Estoque: <?= $registro["quantidade_estoque"]?></h3>
      <h3 class="dashH3">R$<?= $registro["preco"] ?></h3>
        </div>

      <div class="botao-fimCategdash">
        <a class="editar-buttonDash" href="produtoEditar.php?id=<?=$registro ["id"] ?>">Editar</a>
        <a class="remover-buttonDash" href="produtoDeletar.php?id=<?=$registro ["id"] ?>">Remover</a>
    </div>
    </div>
    <?php endforeach?>
            </div>
        </div> 
    </body>
    </html>
