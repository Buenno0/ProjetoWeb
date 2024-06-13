<?php
 require "funcao/validarCategoria.php";

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$id = $_POST["id"];

$validacao = validarCategoria($conexao, $nome, $descricao, $id);

    if (!empty($validacao)) {
        
        die($validacao);
    }

$comando = "UPDATE categorias SET nome = '$nome', descricao = '$descricao' WHERE categoria_id = '$id'";
$result = mysqli_query($conexao, $comando);

if ($result == true){
    echo ("<h1>Categoria atualizada com sucesso!!</h1>"); ?>
    <script>
        setTimeout(function() {
            window.location.href = 'categoriaListarUM.php?categoria_id=<?=$id?>';
        }, 25); 
    </script> <?php
} else {
    die("<h1> ERRO ao atualizar categoria</h1>" . mysqli_error($conexao));
}
?>
