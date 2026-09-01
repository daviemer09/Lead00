<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entradas</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Pesquisar: </label>
        <input type="text">
        <input type="submit" value="Pesquisar">
    </form>
    <br>
    <table border>
        <thead>
            <tr>
                <td>ID</td>
                <td>Produto</td>
                <td>Quantidade</td>
                <td>Custo Unitário</td>
                <td>OBS</td>
                <td>Data Entrada</td>
            </tr>
        </thead>
        <tbody>
        <?php
        include ("./util.php");
        $conn = conecta();

        if ($_POST and $_POST['id_entrada']){
            $varSQL = "SELECT * FROM entrada WHERE id_entrada = :id_entrada ORDER BY data_entrada DES";
            $query = $conn->prepare($varSQL);
        }
        else{
            $varSQL = "SELECT * FROM entrada ORDER BY data_entrada DESC";
            $query = $conn->query($varSQL);
        }

        while($linha = $query->fetch()){
            $id_entrada = $linha['id_entrada'];
            $fk_produto = $linha['fk_produto'];
            $quantidade = $linha['quantidade'];
            $custo_unitario = $linha['custo_unitario'];
            $obs = $linha['obs'];
            $data_entrada = $linha['data_entrada'];

            echo "<tr>
                <td>$id_entrada</td>
                <td>$fk_produto</td>
                <td>$quantidade</td>
                <td>$custo_unitario</td>
                <td>$obs</td>
                <td>$data_entrada</td>
                <td><a href='alterarEntradas.php?id=$id_entrada'>Editar</a></td>
                <td><a href='excluirEntradas.php?id=$id_entrada'>Excluir</a></td>
            </tr>";
        }
        ?>  
        </tbody>
    </table>
    <br>
    <a href="adicionarEntradas.php">Adicionar</a>
</body>
</html>