<?php
    require "header.php";
    require "categoriaHeader.php";
    
    $comando = "SELECT * FROM produtos";
    $result = mysqli_query($conexao, $comando);

    $registros = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if ($usuario_logado): ?>
        <h1 class="nomeUser">Olá, <?=$nomeUsuario?>! Bem-vindo de volta!</h1>
    <?php endif; ?>
    <body>
    <div class="img-main">
        <div class="fundo-tela"></div>
    </div>
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
     <script>
  setTimeout(function() {
  document.querySelector('.nomeUser').classList.add('show');
  }, 1000);
    </script>
