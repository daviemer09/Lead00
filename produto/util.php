<?php 
    
    function conecta($paramString = "")
    {   
        // nao mandou nada, assume a string padrao 
        if ($paramString=="")
            $string_conexao = "pgsql:host=projetoscti.com.br; port=54432; 
                 dbname=loja6b; user=loja6b; password=pF1ydBucfmBJ8w1";
        else {
            // assume a string recebida 
            $string_conexao = $paramString;
        }

        try { //tente
          $c = new PDO($string_conexao);
        } catch (PDOException $e) { // se der erro ...
          echo "Serviço indisponivel no momento, 
                tente mais tarde !<br>".$e->getMessage();
          exit;
        }          
        return $c;
    }

    function salvaUpload($id, $paramCaminho, $paramFiles, $paramCampo)
    {   
     //var_dump(paramFiles); 

     // ISSET verifica se a variavel existe !!  
     if ( isset( $paramFiles[$paramCampo] ) ) {
            // obtem a extensão do arquivo
            $ext = pathinfo($paramFiles[$paramCampo]['name'],
                   PATHINFO_EXTENSION);
            // cria o novo nome do arquivo
            // exemplo: imagens/10.png
            $arquivoImagem = "$paramCaminho/$id.$ext";
            try {
               if (move_uploaded_file($paramFiles[$paramCampo]['tmp_name'], 
                   $arquivoImagem)) {
                   echo "<br>Arquivo $arquivoImagem criado com sucesso.\n";
               } 
            } catch (PDOException $e) { // se der erro ...
               echo "Erro, verifique o arquivo se a pasta imagens existe";
            }     
        }
    }
?>