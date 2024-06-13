<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="IMG/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InserirProduto</title>
</head>

<body>
    <?php
    require "funcao/validarProdutos.php";

    $descricao = trim($_POST["descricao"]);
    $titulo = trim($_POST["titulo"]);
    $preco = trim($_POST["preco"]);
    $quantidade_estoque = trim($_POST["quantidade_estoque"]);
    $categoria_id = trim($_POST["categoria"]);

    $destino= tratarDadosProd($descricao, $titulo, $preco,$quantidade_estoque, $destino);

    $comando = "INSERT INTO produtos (titulo, descricao, preco, quantidade_estoque, prodImg, categoria_id) 
                VALUES ('$titulo', '$descricao', '$preco', '$quantidade_estoque', '$destino', '$categoria_id')";
    $result = mysqli_query($conexao, $comando);

    if ($result == true) {
        header("location: dashboard.php");
    
    } else {
        die("<h1> ERRO  </h1>" . mysqli_error($conexao));
    }
    ?>

</body>

</html>
