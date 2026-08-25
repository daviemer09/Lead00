<html>

<body>
    

    <?php 

        include "util.php";
 
        $conn = conecta();  
           
        if (isset($_POST['valor']) and $_POST['valor']<>"") { 
            $varSQL = " SELECT * FROM produtos
                        where valor <= :paramValor 
                        order by descricao";
            $select = $conn->prepare($varSQL);
            $select->bindParam(":paramValor",$_POST['valor']);
            $select->execute();            
        } else {
            $varSQL = " SELECT * FROM produtos
                        order by descricao";
            $select = $conn->query($varSQL);
        }
        

        echo "<table border=1'>
                <tr>
                    <td>Id</td>
                    <td>Nome</td>
                    <td>descricao</td>
                    <td>valor_unitario</td>   
                    <td>Imagem</td>                               
                    <td>Alterar</td>
                    <td>Excluir</td>
                </tr>";

        while ( $linha = $select->fetch() ) {
            $id             = $linha['id'];
            $nome           = $linha['nome'];
            $descricao      = $linha['descricao'];
            $valor_unitario = $linha['valor_unitario']; 
            $nomeArquivo    = "imagens/produtos/$id.png";
            $excluido        = $linha['excluido']; 
            if ( !file_exists($nomeArquivo) ) {
               $nomeArquivo = "imagens/semnome.png";
            }    

            if($excluido != true){
                echo "
                <tr>
                    <td>$id</td>
                    <td>$nome</td>
                    <td>$descricao </td>
                    <td>$valor_unitario</td>
                    <td>
                    <img src='$nomeArquivo' height=40>
                    </td>                    
                    <td>
                        <a href='alterarProdutos.php?id=$id'>Alterar</a>
                    </td>
                    <td>
                        $excluido
                        <a href='excluirProdutos.php?id=$id'>Excluir</a>
                    </td>
                </tr>";   
            } 
        }

        echo "</table>
              <a href='adicionarProdutos.php'>
                 Adicionar</center>
              </a>";                    
        
    ?>
</body>

</html>
