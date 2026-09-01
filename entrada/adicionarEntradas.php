<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Entradas</title>
</head>
<body>
    <h2>Adicionando entrada de Produtos</h2>
    <form action="insertEntradas.php" method="post">
        <label for="produtos">Produto: </label>
        <select name="produtos" id="produtos">
            <?php
                include('./util.php');
                $conn = conecta();

                $varSQL = "SELECT * FROM produto";
                $query = $conn->query($varSQL);

                while($linha = $query->fetch()){
                    $prod_id = $linha['id_produto'];
                    $prod_name = $linha['nome'];

                    echo "
                        <option value='$prod_id' id='$prod_id' name='$prod_id'>$prod_name</option>
                    ";
                }
            ?>
        </select><br>

        <label for="qnt">Quantidade: </label>
        <input type="number" name="qnt"><br>
        <label for="custo">Custo unitário: </label>
        <input type="number" step="0.01" name="custo"><br>
        <label for="obs">Observação</label>
        <input type="text" name="obs"><br><br>
        
        <input type="submit" value="Adicionar entrada">
    </form>
</body>
</html>