<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="icon" type="image/x-icon" href="IMG/favicon.ico">
    <link rel="stylesheet" href="estilos/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">


</head>

<?php
require "sessaoAdm.php";
require "conexao.php";
$comando = "SELECT usuarios.id, usuarios.cpf, usuarios.nome, COUNT(enderecos.id) AS quantidade_enderecos
            FROM usuarios
            LEFT JOIN enderecos ON usuarios.id = enderecos.usuario_id
            GROUP BY usuarios.id, usuarios.nome";
$result = mysqli_query($conexao, $comando);
$registros = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

   
  
  <div class="categoriaClass">
    <h2 class="h2Categoria"><a href="dashboard.php">Dashboard do adm</a></h2>
    <h2 class="h2Categoria"><a href="usuarioListarTodos.php">Ver usuarios</a></h2>
    <h2 class="h2Categoria"><a href="ListarCategorias.php">Ver categorias</a></h2>
    <h2 class="h2Categoria"><a href="produtoFormulario.php">Adiconar produto</a></h2>
   
  </div>
  <br>
  <div class="tabelaProd">
    <h2 class="h2Categoria">Id</h2>
    <br>
    <h2 class="h2Categoria">Nome</h2>
    
    <h2 class="h2Categoria">Endereços Cadastrados</h2>
    <h2 class="h2Categoria">Ações</h2>
    <br>
    
  </div>
<div class="flex-containerUserListar">
<?php foreach ($registros as $registro): ?>
    <div class="prod-editar">
        <h3 class ="h3LCateg"><?= $registro["id"] ?></h3>
        <div class="produt-text">
          <br>
            <h3 class ="h3LCateg"><?= $registro["nome"] ?></h3>
            <h3 class ="h3LCateg"><?= $registro["quantidade_enderecos"] ?></h3>
        </div>
        <div class="botao-fim">
            <a class="editar-button" href="userListarUM.php?id=<?= $registro["id"] ?>">Ver usuário</a>
            <a class="editar-button" href="userEditar.php?id=<?= $registro["id"] ?>">Editar</a>
            <a class="editar-button" href="userDeletar.php?id=<?= $registro["id"] ?>" onclick="return confirmAcao()">Remover usuário</a>
        </div>
    </div>
<?php endforeach ?>

  <script>
    function confirmAcao() {
      var confirmacao = window.confirm("Você tem certeza de que deseja remover este usuário? Esta ação não poderá ser desfeita.");
      return confirmacao; 
    }
  </script>
  
    
        </div>
    
</body>
</html>
