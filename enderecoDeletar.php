<?php
    require "sessaoAdm.php";
    require "conexao.php";
    //error_reporting(E_ALL);
   // ini_set('display_errors', 1);
    
    $id = $_GET["id"];
    $idUser = $_GET["idUser"];
    if ($id == null){
        die("endereço não existe");
        //header ("location: cadastro.php");
    }
    $comando = "DELETE FROM enderecos WHERE id=$id";
    $resultado = mysqli_query($conexao, $comando);

    if($resultado == true){
        header ("location: userListarUM.php?id=$idUser");
      } else {
        die(mysqli_error($conexao));
    }
    ?>