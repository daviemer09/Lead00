<?php
include('./util.php');
$conn = conecta();

$ID = $_GET['id'];

$varSQL = "DELETE FROM entrada WHERE id_entrada = :id_entrada";
$delete = $conn->prepare($varSQL);
$delete->bindParam(":id_entrada", $ID);
$delete->execute();

header("Location: entradas.php");
?>