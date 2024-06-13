<?php
require "funcao/validarUser.php";
    
escapeDados($conexao);
validarCampos($nome, $email, $senha, $cpf, $dtNasc);

$comando = "UPDATE usuarios 
            SET nome = '$nome', email = '$email', cpf = '$cpf', senha = '$senha', dtNasc = '$dtNasc' 
            WHERE id = '$id'";

$result = mysqli_query($conexao, $comando);

if ($result == true){
    echo "<h1>Atualização feita com Sucesso!!</h1>";
    ?>
    <script>
        setTimeout(function() {
            window.location.href = 'userListarUM.php?id=<?= $id ?>';
        }, 500);
    </script>
    <?php
} else {
    die("Erro");
}
?>
