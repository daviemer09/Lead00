<?php
    include "util.php";
    $conn = conecta();
    $varSQL = "insert into produtos (nome,descricao,valor_unitario,nomearquivo)
               values (:nome,:descricao,:valor_unitario,:nomearquivo)";
    $insert = $conn->prepare($varSQL);
    $insert->bindParam(':nome',$_POST['nome']);
    $insert->bindParam(':descricao',$_POST['descricao']);
    $insert->bindParam(':valor_unitario',$_POST['valor_unitario']);
    $insert->bindParam(':nomearquivo', $_FILES['arquivo']['name']);
    
    // se o registro for inserido normalmente...
    if ( $insert->execute() ) {
         // se o usuario mandar imagem apenas...
         // salvaUpload($id, $paramCaminho, $paramFiles, $paramCampo)
         salvaUpload($conn->lastInsertId(),"imagens/produtos", 
                     $_FILES, 'arquivo');
    }  

    header("Location: produtos.php");
?>