<?php
    require "sessaoAdm.php";
    require "conexao.php";

    $id = $_GET["id"];

    $comando = "DELETE FROM produtos WHERE id=$id";
    $resultado = mysqli_query($conexao, $comando);

    if($resultado == true){
        header("location: dashboard.php");
        ?>
        <h1><a href="dashboard.php">Voltar</a></h1>
    <?php
     } else {
        die(mysqli_error($conexao));
    }
    ?>