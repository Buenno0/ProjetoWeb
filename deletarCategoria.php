<?php
    require "sessaoAdm.php";
    require "conexao.php";

    $id = $_GET["categoria_id"];

    $comando = "DELETE FROM categorias WHERE categoria_id=$id";
    $resultado = mysqli_query($conexao, $comando);

    if($resultado == true){
        header("location: ListarCategorias.php");
     } else {
        die(mysqli_error($conexao));
    }
    ?>