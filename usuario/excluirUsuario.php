<?php
    include ("util.php");
    $conn = conecta();
    $id = $_GET['id'];
    $varSQL ="UPDATE usuario set excluido = TRUE, data_exclusao = :data_exclusao WHERE id = :id";
    $update = $conn->prepare($varSQL);
    $dataAtual = date("Y-m-d H:i:s");
    $update->bindParam(":data_exclusao", $dataAtual);
    $update->bindParam(':id', $id);
    $update->execute();

    header("Location: usuario.php");    
?>
