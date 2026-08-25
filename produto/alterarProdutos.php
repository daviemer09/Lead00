<html>

<body>
    <?php
        include "util.php";
        $conn = conecta();
        $id = $_GET['id']; // recupera o id
        $varSQL = "SELECT * FROM produtos WHERE id = :id";
        $select = $conn->prepare($varSQL);
        $select->bindParam(':id', $id);
        $select->execute();
        $linha = $select->fetch(); // não tem while, é 1 linha

        $id = $linha['id'];
        $nome = $linha['nome'];
        $descricao = $linha['descricao'];
        $valor_unitario = $linha['valor_unitario'];
    ?>

    <form action='updateProdutos.php' method='post' 
        enctype="multipart/form-data">

        <input type='hidden' name='id'        value='<?= $id ?>'>
        Nome<br>
        <input type='text'   name='nome'    value='<?= $nome ?>'><br>
        descricao<br>
        <input type='text'   name='descricao' value='<?= $descricao ?>'><br>
        valor_unitario<br>
        <input type='text'   name='valor_unitario'     value='<?= $valor_unitario ?>'><br>
        
        <?php
             if ( file_exists("imagens/produtos/$id.png") ) 
                echo "<img src='imagens/produtos/$id.png' height=40><br>";                             
             
        ?>

        <input type='file' name='arquivo'><br>
        <input type='submit' value='Salvar'>
    </form>
</body>

</html>