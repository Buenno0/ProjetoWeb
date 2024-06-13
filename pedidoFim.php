<?php
$valor = $_POST['valorFinal'];
$valor = number_format($valor, 2, ',', '.');
require "header.php";
?>

<body class="bodyPedido">
  <div class="containerPedidoFim">
    <h1><?=$nomeUsuario?>, escolha a forma de pagamento. </h1>
    <h1>Total do seu pedido: R$:<?=$valor?></h1>
    <div class="formas-pagamentoPedido">
      <div class="forma" id="cartao">
      <img class="imgPedido" src="https://img.icons8.com/emoji/48/credit-card-emoji.png" alt="Cartão de Crédito">
        <p>Cartão de Crédito</p>
      </div>
      <hr>
      <div class="forma" id="pix">
      <img class="imgPedido" src="https://img.icons8.com/fluency/48/pix.png" alt="PIX">
        <p>PIX</p>
      </div>
      <hr>
      <div class="forma" id="boleto">
        <img class="imgPedido" src="https://img.icons8.com/color/48/000000/boleto-bankario.png" alt="Boleto Bancário">
        <p>Boleto Bancário</p>
      </div>
    </div>
    <button class="btPedido" id="botaoPagar">Pagar</button>
  </div>

  <script src="script/script.js"></script>
</body>
<?php require "footer.php"?>
