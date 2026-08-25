<?php
    include "util.php";
    $conn = conecta();
    $varSQL = " update produtos set nome = :nome, descricao = :descricao, valor_unitario = :valor_unitario, nomearquivo = :nomearquivo
                WHERE id = :id";
    $update = $conn->prepare($varSQL);
    $update->bindParam(':nome', $_POST['nome']);
    $update->bindParam(':descricao', $_POST['descricao']);
    $update->bindParam(':valor_unitario', $_POST['valor_unitario']);
    $update->bindParam(':id', $_POST['id']);
    $update->bindParam(':nomearquivo', $_FILES['arquivo']['name']);

    // se o registro for alterado normalmente...
    if ( $update->execute() ) {
         // se o usuario mandar imagem apenas...
         // salvaUpload($id, $paramCaminho, $paramFiles, $paramCampo)
         salvaUpload($_POST['id'],"imagens/produtos", 
                     $_FILES, 'arquivo');
    }  

    header("Location: produtos.php");
?>