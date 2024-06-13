<?php
 $nomesCategorias = array();
$comandoCategorias = "SELECT categoria_id, nome FROM categorias";
$resultCategorias = mysqli_query($conexao, $comandoCategorias);
while ($rowCategoria = mysqli_fetch_assoc($resultCategorias)) {
    $nomesCategorias[$rowCategoria['categoria_id']] = $rowCategoria['nome'];
}
?>