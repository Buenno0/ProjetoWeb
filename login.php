<?php require "header.php";         
    if (isset($_SESSION['tipo_usuario'])) {
        if ($_SESSION['tipo_usuario'] === 'comum') {
            header("Location: index.php");
             exit();
            } elseif ($_SESSION['tipo_usuario'] === 'adm') {
                header("Location: dashboard.php");
                exit();
                }}
            ?> 
    <body class="bodyForm">
    <h1 class="h1Log"></h1>
    <div class="form-containerUser">
        <form action="entrar.php" method="post">
            <h2>Login do Usuário</h2>
            <label for="cpf">CPF: (apenas números)</label>
            <input type="text" id="cpf" maxlength="11" name="cpf"><br><br>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required><br><br>
            <input type="submit" value="Login">
            <a href="cadastro.php">Criar conta</a>
            </form>
    </div>
        <br>
        <br>
        <br>
        </body>
<?php require "footer.php"; ?>
        
  
