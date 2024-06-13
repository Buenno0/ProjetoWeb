<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="icon" type="image/x-icon" href="IMG/favicon.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>

<header>
    <nav class="navHeader">
        <?php
        session_start();
        $usuario_logado = isset($_SESSION['id_usuario']); 
        $nomeUsuario = isset($_SESSION['nome_usuario']) ? $_SESSION['nome_usuario'] : 'Usuário'; 
        ?>

        <div class="logo">
            <a href="index.php"><img class="imgHeader" src="IMG/In-Shot-20230612-200007941.png" alt="Logo"></a>
        </div>
        
        <form action="produtosSearch.php" method="post" class="form-class">
            <input type="search" name="pesquisa" class="search-input">
            <button type="submit" class="search-button">
                <img class="imgHeader" src="https://i.ibb.co/wpx37X5/lupa.png" alt="lupa">
            </button>
        </form>
        
        <div class="perfil">
            
            <a href="carrinho.php"><img class="imgHeader" src="IMG/icons8-carrinho-de-compras-48(1).png" alt="cart"></a>
            <hr>
            <a href="login.php"><img class="imgHeader" src="https://i.ibb.co/tLT6RLs/icons8-user-50.png" alt="user"></a>
            <hr>
            <?php
            if ($usuario_logado): ?>
            <a href="logout.php"><img width="50" height="50" src="IMG/icons8-sair-32.png" alt="exit"/></a>
             <?php endif; ?>   
        </div>
    </nav>
</header>

