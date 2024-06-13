<?php
    require "sessaoAdm.php";
    require "conexao.php";

    $id = $_GET["id"];

    $comando = "DELETE FROM usuarios WHERE id=$id";
    $resultado = mysqli_query($conexao, $comando);

    if($resultado == true){
        header ("location: usuarioListarTodos.php");
        ?>
        
    <?php } else {
        die(mysqli_error($conexao));
    }
    ?>