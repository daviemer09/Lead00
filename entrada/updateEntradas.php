<?php
include('./util.php');
$conn = conecta();

$id = $_POST['id'];
$quantidade = $_POST['qnt'];
$custo_unitario = $_POST['valor'];
$obs = $_POST['obs'];
$data_entrada = date("Y-m-d H:i:s");

$varSQL = "UPDATE entrada SET, quantidade = :quantidade, custo_unitario = :custo_unitario, obs = :obs, data_entrada = :data_entrada WHERE id_entrada = :id";
$update = $conn->prepare($varSQL);
$update->bindParam(":quantidade", $quantidade);
$update->bindParam(":custo_unitario", $custo_unitario);
$update->bindParam(":obs", $obs);
$update->bindParam(":data_entrada", $data_entrada);

header("Location: entradas.php");
?>