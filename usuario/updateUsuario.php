<?php
    include "util.php";
    $conn = conecta();
    $varSQL = " update usuario set nome = :nome, email = :email, senha = :senha, 
    telefone = :telefone, nomearquivo = :nomeArquivo
                WHERE id = :id";
    $update = $conn->prepare($varSQL);
    $update->bindParam(':nome', $_POST['nome']);
    $update->bindParam(':email', $_POST['email']);
    $update->bindParam(':senha', $_POST['senha']);
    $update->bindParam(':telefone', $_POST['telefone']);
    $update->bindParam(':id', $_POST['id']);
    $update->bindParam(':nomeArquivo', $_FILES['arquivo']['name']);

    // se o registro for alterado normalmente...
    if ( $update->execute() ) {
         // se o usuario mandar imagem apenas...
         // salvaUpload($id, $paramCaminho, $paramFiles, $paramCampo)
         salvaUpload($_POST['id'],"imagens/usuario", 
                     $_FILES, 'arquivo');
    }  

    header("Location: usuario.php");
?>