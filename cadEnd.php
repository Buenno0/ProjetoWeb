<!DOCTYPE html>
<html>
<head>
    <title> Adicionar endereço</title>
    <link rel="icon" type="image/x-icon" href="IMG/favicon.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/main.css">
    
</head>
<body>
    <?php $id_user = $_GET["id"]; ?>
    <h1 class="h1Log">Cadastro de Endereço</h1>
    <div class="form-containerUser">
        
    <form action="endInserir.php?id=<?=$id_user?>" method="post">
      
        <h1 class="h1Log">Endereço</h1>
        <label for="cep">CEP:</label>
        <input type="text" id="cep" name="cep" required maxlength="8"><br><br>
        
        <label for="rua">Rua:</label>
        <input type="text" id="rua" name="rua" required><br><br>
        
        <label for="numero">Número:</label>
        <input type="text" id="numero" name="numero" maxlength="10"><br><br>
        
        <label for="numero_apartamento">Número do Apartamento:</label>
        <input type="text" id="numero_apartamento" name="numero_apartamento" maxlength="10"><br><br>
        
        <label for="bloco">Bloco:</label>
        <input type="text" id="bloco" name="bloco" maxlength="20"><br><br>
        
        <label for="cidade">Cidade:</label>
        <input type="text" id="cidade" name="cidade" required maxlength="50"><br><br>
        
        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" required maxlength="50"><br><br>
        
        <input type="submit" value="Cadastrar">
    </form>
</div>

</body>
</html>
