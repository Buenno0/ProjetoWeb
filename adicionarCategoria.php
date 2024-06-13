    <?php
    require "funcao/validarCategoria.php";

    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $id = 0;
    $validacao = validarCategoria($conexao, $nome, $descricao, $id);

    if (!empty($validacao)) {
        
        die($validacao);
    }

    $sql = "INSERT INTO categorias (nome, descricao) VALUES ('$nome', '$descricao')";

    if (mysqli_query($conexao, $sql)) {
        ?>
        <script>
            setTimeout(function() {
                window.location.href = 'ListarCategorias.php';
            }, 250); 
        </script>
        <?php
    } else {
        echo "Erro ao inserir categoria: " ;
    }
    ?>

