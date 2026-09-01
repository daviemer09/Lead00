<?php
    include "util.php";
    $conn = conecta();

    $senhaHash = password_hash($_POST['senha'], PASSWORD_BCRYPT);


    $varSQL = "insert into usuario (nome,email,senha,telefone,nomeArquivo)
               values (:nome,:email,:senha,:telefone,:nomeArquivo)";
    
    $insert = $conn->prepare($varSQL);
    $insert->bindParam(':nome',$_POST['nome']);
    $insert->bindParam(':email',$_POST['email']);

    $insert->bindParam(':senha', $senhaHash);
    
    $insert->bindParam(':telefone',$_POST['telefone']);
    $insert->bindParam(':nomeArquivo', $_FILES['arquivo']['name']);
    
    // se o registro for inserido normalmente...
    if ( $insert->execute() ) {
         // se o usuario mandar imagem apenas...
         // salvaUpload($id, $paramCaminho, $paramFiles, $paramCampo)
         salvaUpload($conn->lastInsertId(),"imagens/usuario", 
                     $_FILES, 'arquivo');
    }  

    header("Location: usuario.php");
?>

