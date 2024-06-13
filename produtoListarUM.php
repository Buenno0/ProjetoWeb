<?php
//require "header.php";
require "conexao.php";
require "header.php";

$id = $_GET["id"];

$comando = "SELECT p.*, c.nome AS categoria_nome
            FROM produtos p
            LEFT JOIN categorias c ON p.categoria_id = c.categoria_id
            WHERE p.id = $id";
$resultado = mysqli_query($conexao, $comando);

$reg = mysqli_fetch_assoc($resultado);

$titulo = $reg["titulo"];
$descricao = $reg["descricao"];
$preco = $reg["preco"];
$categoria_nome = $reg["categoria_nome"];
?>

<div class="containerUm">
    <div class="pai-imgUm">
        <div class="imagens-baixo">
            <img src="<?= $reg["prodImg"] ?>" alt="Produto" class="produtos-loja">
        </div>
    </div>
    <div class="tituloUm">
        <h1 class="h1ProdListarUm"> <?=$titulo?></h1>
        <div class="categoriaUm">
            <h2 class="h2ProdListarUm"><strong>Categoria:</strong></h2>
            <h3><?=$categoria_nome?></h3>
        </div>
        <div class="descricaoUm">
            <h2 class="h2ProdListarUm"><strong>Descrição:</strong></h2>
            <h3><?=$descricao?></h3>
        </div>
        <div class="precoUm">
            <h1 class="h1ProdListarUm"> <strong>Preço:</strong></h1><h1 class="valorprod"> R$<?=$preco?></h1>
        </div>
        
    </div>
</div>
<?php 
require "footer.php";
?>

