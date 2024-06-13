<?php
    require "header.php";
    require "categoriaHeader.php";

    $pesquisa = $_POST["pesquisa"];
    $pesquisa = '%' . $pesquisa . '%';

    $comando = "SELECT * FROM produtos WHERE titulo LIKE '$pesquisa'";
    $result = mysqli_query($conexao, $comando);
    $registros = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $qtdProd = mysqli_num_rows($result);

    echo "<br>
    <h2>Foram encontrados <strong>$qtdProd</strong> produto(s) nesta pesquisa. </h2>";
    ?>
    <body>
    <div class="flex-container">
        <?php foreach ($registros as $registro): ?>
            <div class="item">
                <a href="produtoListarUM.php?id=<?= $registro["id"] ?>">
                    <img src="<?= $registro["prodImg"] ?>" alt="Produto" class="produtos-loja">
                </a>
                <h2><a href="produtoListarUM.php?id=<?= $registro["id"] ?>"><?= $registro["titulo"] ?></a></h2>
                <h3> R$<?= $registro["preco"] ?></h3>
                <div class="shop">
                <a href="produtoListarUM.php?id=<?= $registro["id"] ?>"><button class="comprar-botao">Comprar</button></a>
                <a href="addToCart.php?idProd=<?= $registro["id"] ?>"><img src="https://i.ibb.co/hFhVN1n/icons8-shopping-cart-50-3.png" alt="icons8-shopping-cart-50-3" border="0"></a>   
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <br>
</body>
<?php require "footer.php" ?>


