<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="IMG/favicon.ico">
    <link rel="stylesheet" href="estilos/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
   
</head>
<body class="bodyCatListarUm">
    <?php
    require "sessaoAdm.php";
    require "conexao.php";
    require "queryUsuarios.php";
   // error_reporting(E_ALL);
  //  ini_set('display_errors', 1);
    

?>

<div class="categoriaListarUm">
    <h2 class="h2ListarUm"><a href="dashboard.php">Dashboard do adm</a></h2>
    <h2 class="h2ListarUm"><a href="usuarioListarTodos.php">Ver usuarios</a></h2>
    <h2 class="h2ListarUm"><a href="produtoFormulario.php">Adiconar Produto</a></h2>
   
  </div>
<br>
<h1 class="dados">Dados do usuário: </h1>
    <div class="containerCateListarUm">
        
        <h1 class="h1ListarUm"> <?=$dadosUsuario['nome']?></h1>
        <br>
        <div class="info">
            <p class="pListarUm"><strong>Id:</strong><?=$usuario_id?></p>
            <p class="pListarUm"><strong>Email:</strong><?=$dadosUsuario['email']?></p>
            <p class="pListarUm"><strong>cpf:</strong> <?=$dadosUsuario['cpf']?></p>
            <p class="pListarUm"><strong>data de nascimento: </strong><?=$dadosUsuario['dtNasc']?></p>
            <p class="pListarUm"><strong>Senha: </strong><?=$dadosUsuario['senha']?></p>
        </div>
    
        <div class="fim">
            <h1 class="h1ListarUm"><a href="usuarioListarTodos.php">Voltar</a></h1>
            <h1 class="h1ListarUm"><a href="userEditar.php?id=<?=$usuario_id ?>">Editar usuário</a></h1>
            <h1 class="h1ListarUm"><a href="userDeletar.php?id=<?=$usuario_id?>" onclick="return confirmAcao()">Remover usuário</a></h1>
        </div>

        </div>

        <div class="dados">Endereços do usuário: </div>
        <a href="cadEnd.php?id=<?=$usuario_id?>">Cadastrar novo endereço</a>

        <?php
foreach ($enderecos as $endereco) {
    
    if (!empty($endereco['id'])) {
       
        ?>
        <div class="containerCateListarUm">
            <h1 class="h1ListarUm">Id do Endereço: <?= $endereco['id'] ?></h1>
            <div class='info'>
                <p class="pListarUm"><strong>Rua:</strong> <?= $endereco['rua'] ?></p>
                <p class="pListarUm"><strong>Número:</strong> <?= $endereco['numero'] ?></p>
                <p class="pListarUm"><strong>Cidade:</strong> <?= $endereco['cidade'] ?></p>
                <p class="pListarUm"><strong>Estado:</strong> <?= $endereco['estado'] ?></p>
                <p class="pListarUm"><strong>CEP:</strong> <?= $endereco['cep'] ?></p>
            </div>
            <div class="fim">
                <h1 class="h1ListarUm"><a href="usuarioListarTodos.php">Voltar</a></h1>
                <h1 class="h1ListarUm"><a href="enderecoEditar.php?id=<?= $endereco["id"] ?>&idUser=<?= $usuario_id ?>">Editar Endereço</a></h1>
                <h1 class="h1ListarUm"><a href="enderecoDeletar.php?id=<?= $endereco["id"] ?>&idUser=<?= $usuario_id ?>" onclick="return confirmAcao()">Remover endereço</a></h1>
            </div>
        </div>
        <?php
    }
}
?>

        <script>
            function confirmAcao() {
              var confirmacao = window.confirm("Você tem certeza de que deseja remover? Esta ação não poderá ser desfeita.");
              return confirmacao; 
            }
          </script>
</body>
</html>