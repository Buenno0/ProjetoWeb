<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <link rel="icon" type="image/x-icon" href="IMG/favicon.ico">
        <link rel = "stylesheet" href="estilos/main.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Produto</title>
        </head>
    
    <body class="bodyProdEditar">
        <h1 class="h1ProdEditar">Cadastrar novo produto</h1>

        <form class="fromProdEditar" action="produtoInserir.php" method="post" enctype="multipart/form-data">
            Titulo <input type="text" name="titulo"><br>
            <br>
            Descricao <textarea name="descricao" rows="2" cols="50"></textarea><br>
            <br>
            Preco <input type="text" name="preco"><br>
            <br>
            Quantidade Estoque <input type="number" name="quantidade_estoque"><br>
            <br><label for="categoria">Categoria:</label>
        <select name="categoria" id="categoria">
            <?php
            require "sessaoAdm.php";
            require "conexao.php";

            $comando = "SELECT categoria_id, nome FROM categorias";
            $result = mysqli_query($conexao, $comando);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value=" . $row['categoria_id'] . ">" . $row['nome'] . "</option>";
                }
            } else {
                echo "<option value='0'>Nenhuma categoria encontrada</option>";
            }
            ?>
        </select><br><br>

            Inserir Imagens <input type="file" name="img"><br>
            <button type="submit">Cadastrar Produto</button>
        </form>
        <h1><a href="dashboard.php">Ver Dashboard</a></h1>
    </body>
    </html>
