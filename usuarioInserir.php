
<?php
require "funcao/validarUser.php";
require "funcao/validarEndereco.php";

$rua = trim($_POST['rua']);
$cidade = trim($_POST['cidade']);
$estado = trim($_POST['estado']);
$cep = trim($_POST['cep']);
$numero = $_POST['numero'];
$numero_apartamento = $_POST['numero_apartamento'];
$bloco = $_POST['bloco'];

  
escapeDados($conexao);
validarCampos($nome, $email, $senha, $cpf, $dtNasc);
$cep = validarEndereco($rua, $cidade, $estado, $cep);

//Verficar se email ou cpf já são cadastrados
$comando = "SELECT COUNT(*) FROM usuarios WHERE email = '$email' OR cpf = '$cpf'";
$result = mysqli_query($conexao, $comando);
$row = mysqli_fetch_row($result);

if ($row[0] > 0) {
    die("<h1> E-mail ou CPF já cadastrados.</h1>");
}

$comando = "INSERT INTO usuarios (nome, email, cpf, senha, dtNasc) values ('$nome', '$email', '$cpf', '$senha', '$dtNasc')";
$result = mysqli_query($conexao, $comando);

if ($result == true) {
    
    $usuario_id = mysqli_insert_id($conexao); // Obtém o ID do usuário inserido
    
    $endereco_comando = "INSERT INTO enderecos (usuario_id, rua, numero, numero_apartamento, bloco, cidade, estado, cep) VALUES ('$usuario_id', '$rua', '$numero', '$numero_apartamento', '$bloco', '$cidade', '$estado', '$cep')";
    
    $endereco_result = mysqli_query($conexao, $endereco_comando);

    if ($endereco_result == true) {
        echo "<h1>Cadastro de usuário e endereço feito com sucesso!</h1>";
        ?>
        <script>
            setTimeout(function() {
                window.location.href = 'index.php';
            }, 210); 
        </script>
        <?php
    } else {
        die("<h1>Erro ao inserir endereço:</h1>" . mysqli_error($conexao));
    }
} else {
    die("<h1>Erro ao inserir usuário:</h1>" . mysqli_error($conexao));
}
?>

