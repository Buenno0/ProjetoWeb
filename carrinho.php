<?php
require "conexao.php";
require "header.php";
$carrinho = $_SESSION["carrinho"];

if (empty($carrinho)) {
    ?>
    <body>
        <h1>O seu carrinho está vazio!</h1>
    </body>
    <?php
        require "footer.php";
    exit; 
}
$idsProdutos = implode(",", $carrinho);
$sql = "SELECT * FROM produtos WHERE id IN ($idsProdutos)";
$resultado = $conexao->query($sql);
?>
<body class="bdCart">
    <?php
    if ($usuario_logado): ?>
        <h1 class="nomeUser">Carrinho de <?=$nomeUsuario?>!</h1>
    <?php endif; ?>

    <div class="containerCart">
    <?php
$total = 0; 

while ($row = $resultado->fetch_assoc()) :
    $total += $row['preco']; 
?>
    
    <div class="produtoCart">
         <div class="imgshop"><img class="imgprodCart" src="<?= $row["prodImg"] ?>" alt="Produto"></div>
        <div class="tituloCart"><?php echo $row['titulo']; ?></div>
        <div class="precoCart">R$ <?php echo number_format($row['preco'], 2, ',', '.'); ?></div>
        <a href="removerProd.php?id=<?=$row['id']?>">Remover produto</a>
    </div>
<?php endwhile; ?>
    </div>
    <form class="finalPedido" action="pedidoFim.php" method="post">
    <input type="hidden" name="valorFinal" value="<?=$total?>">
    <div class="comprar-prod"><h2>Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></h2> </div>
    <button type="submit" class="shop-btn">Comprar</button>
    </form>
</div>
</body>
<?php require "footer.php" ?>

