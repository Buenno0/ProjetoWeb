<?php

$nome = $_POST['nome'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$msg = $_POST['mensagem'];
$dtEnvio = date('d/m/Y');
$hrEnvio = date('H:i:s');

$sendEmail = "
    <html>
        <h1>Assunto: $assunto</h1>
        <p>Nome: $nome</p>
        <p>Mensagem: $msg</p>
    </html>
";

$destino = "mat.bueno7@gmail.com";
$assuntoEmail = "Formulário de Contato - $assunto";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: $email" . "\r\n";

mail($destino, $assuntoEmail, $sendEmail, $headers);


header("Location: contato.php");
?>


