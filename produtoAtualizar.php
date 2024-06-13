<?php 
require "sessaoAdm.php";
require "conexao.php";

$id = $_POST["id"];
$descricao = trim($_POST["descricao"]);
$titulo = trim($_POST["titulo"]);
$preco = trim($_POST["preco"]);
$qtdEstoque = trim($_POST["quantidade_estoque"]);
$categoria_id = trim($_POST["categoria"]);
$img = $_FILES["img"];


if (empty($titulo) || empty($descricao) || empty($preco) || empty($qtdEstoque) || empty($categoria_id)) {
    die("Nenhum campo deve ser deixado em branco!");
}

if (isset($img) && !empty($img["name"])) {
    $source = $img["tmp_name"];
    $destino = "imgProd/" . $img["name"];
    move_uploaded_file($source, $destino);
    
    $verificaImg = array("jpg", "jpeg", "png", "gif");
    $uploadedExtension = strtolower(pathinfo($img["name"], PATHINFO_EXTENSION));

    if (!in_array($uploadedExtension, $verificaImg)) {
    die("tipo de arquivo não permitido");
}
    
    $comando = "UPDATE produtos SET titulo = '$titulo',
    descricao = '$descricao', 
    preco = '$preco',
    quantidade_estoque = '$qtdEstoque',
    categoria_id = '$categoria_id',
    prodImg = '$destino'
    WHERE id = $id";
} else {
   
    $comando = "UPDATE produtos SET titulo = '$titulo',
    descricao = '$descricao', 
    preco = '$preco',
    quantidade_estoque = '$qtdEstoque',
    categoria_id = '$categoria_id'
    WHERE id = $id";
}
$resultado = mysqli_query($conexao, $comando);

if ($resultado) {
    header("location: dashboard.php");
} else {
    die(mysqli_error($conexao));
}
?>
