<html>

<body>
    
    <?php 

        include "util.php";
 
        $conn = conecta();  
           
        if (isset($_POST['valor']) and $_POST['valor']<>"") { 
            $varSQL = " SELECT * FROM usuario
                        where valor <= :paramValor 
                        order by email";
            $select = $conn->prepare($varSQL);
            $select->bindParam(":paramValor",$_POST['valor']);
            $select->execute();            
        } else {
            $varSQL = " SELECT * FROM usuario
                        order by email";
            $select = $conn->query($varSQL);
        }
        

        echo "<table border=1'>
                <tr>
                    <td>Id</td>
                    <td>Nome</td>
                    <td>Email</td>
                    <td>Telefone</td>
                    <td>Imagem</td>                              
                    <td>Alterar</td>
                    <td>Excluir</td>
                </tr>";

        while ( $linha = $select->fetch() ) {
            $id             = $linha['id'];
            $nome           = $linha['nome'];
            $email          = $linha['email'];
            $telefone       = $linha['telefone'];
            $nomeArquivo    = "imagens/usuario/$id.png";
            $excluido        = $linha['excluido']; 
            if ( !file_exists($nomeArquivo) ) {
               $nomeArquivo = "imagens/usuario/semfoto.png";
            }    

            if($excluido != true){
                echo "
                <tr>
                    <td>$id</td>
                    <td>$nome</td>
                    <td>$email </td>
                    <td>$telefone</td>
                    <td>
                    <img src='$nomeArquivo' height=40>
                    </td>                    
                    <td>
                        <a href='alterarUsuario.php?id=$id'>Alterar</a>
                    </td>
                    <td>
                        $excluido
                        <a href='excluirUsuario.php?id=$id'>Excluir</a>
                    </td>
                </tr>";   
            } 
        }

        echo "</table>
              <a href='adicionarUsuario.php'>
                 Adicionar</center>
              </a>";                    
        
    ?>
</body>

</html>
