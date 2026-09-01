<?php
include ('./util.php');
$conn = conecta();

if ($_POST){
    $fk_produto = $_POST['produtos'];
    $qnt = $_POST['qnt'];
    $custo = $_POST['custo'];
    $obs = $_POST['obs'];
    $timestamp = date('Y-m-d H:i:s');

    $varSQL = "INSERT INTO entrada (fk_produto, quantidade, custo_unitario, obs, data_entrada) VALUES (:fk, :qnt, :custo, :obs, :tempo)";
    $insert = $conn->prepare($varSQL);
    $insert->bindParam(":fk", $fk_produto);
    $insert->bindParam(":qnt", $qnt);
    $insert->bindParam(":custo", $custo);
    $insert->bindParam(":obs", $obs);
    $insert->bindParam(":tempo", $timestamp);
    $insert->execute();
}

header("Location: entradas.php");
?>