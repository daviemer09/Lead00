<html>

<body>
    <?php
        include "util.php";
        $conn = conecta();
        $id = $_GET['id']; // recupera o id
        $varSQL = "SELECT * FROM usuario WHERE id = :id";
        $select = $conn->prepare($varSQL);
        $select->bindParam(':id', $id);
        $select->execute();
        $linha = $select->fetch(); // não tem while, é 1 linha

        $id = $linha['id'];
        $nome = $linha['nome'];
        $email  = $linha['email'];
        $senha = $linha['senha'];
        $telefone = $linha['telefone'];
        $admin = $linha['admin'];
    ?>

    <form action='updateUsuario.php' method='post' 
        enctype="multipart/form-data">

        <input type='hidden' name='id'        value='<?= $id ?>'>
        Nome<br>
        <input type='text'   name='nome'    value='<?= $nome ?>'><br>
        email<br>
        <input type='text'   name='email' value='<?= $email ?>'><br>
        senha<br>
        <input type='text'   name='senha'     value='<?= $senha ?>'><br>
        telefone<br>
        <input type='text'   name='telefone' value='<?= $telefone ?>'><br>
        
        <?php
             if ( file_exists("imagens/usuario/$id.png") ) 
                echo "<img src='imagens/usuario/$id.png' height=40><br>";                             
             
        ?>

        <input type='file' name='arquivo'><br>
        <input type='submit' value='Salvar'>
    </form>
</body>

</html>
