<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editando produtos</title>
</head>
<body>
    <form action="updateEntradas.php" method="post">
        <?php
        include('./util.php');
        $conn = conecta();

        $id = $_GET['id'];

        $SQLEntrada = "SELECT * FROM entrada WHERE id_entrada = :id_entrada";
        $entrada = $conn->prepare($SQLEntrada);
        $entrada->bindParam(":id_entrada", $id);
        $entrada->execute();

        $linha = $entrada->fetch();
        $quantidade = $linha['quantidade'];
        $custo_unitario = $linha['custo_unitario'];
        $obs = $linha['obs'];
        $data_entrada = $linha['data_entrada'];

        echo "
            <input type='hidden' name='id' id='id' value='$id'>
        ";
        ?>

        <label for="qnt">Quantidade: </label>
        <input type="number" name="qnt" id="qnt" value="<?= $quantidade ?>"><br>
        <label for="qnt">Custo: </label>
        <input type="number" step="0.01" name="valor" id="valor" value="<?= $custo_unitario ?>"><br>
        <label for="qnt">Obs: </label>
        <input type="text" name="obs" id="obs" value="<?= $obs ?>"><br>

        <input type="submit" value="Salvar alterações">
    </form>
</body>
</html>