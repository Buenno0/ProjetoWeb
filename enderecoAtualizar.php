<?php require "funcao/validarEndereco.php";


    $id = $_POST["id"];
    $rua = $_POST["rua"];
    $numero = $_POST["numero"];
    $numero_apartamento = $_POST["numero_apartamento"];
    $bloco = $_POST["bloco"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $cep = $_POST["cep"];

    $cep = validarEndereco($rua, $cidade, $estado, $cep);
    
        $comando = "UPDATE enderecos SET rua='$rua', numero='$numero', numero_apartamento='$numero_apartamento', bloco='$bloco', cidade='$cidade', estado='$estado', cep='$cep' WHERE id=$id";

        if (mysqli_query($conexao, $comando)) {
            echo "Endereço atualizado com sucesso!";
            ?>
            <script>
        setTimeout(function() {
            window.location.href = 'usuarioListarTodos.php';
        }, 700); 
    </script>
      <?php  } else {
            echo "Erro na atualização do endereço";
        }
    
mysqli_close($conexao);
?>
