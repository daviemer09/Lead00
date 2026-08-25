<?php 
    function conecta($paramString = "")
    {   
        if ($paramString=="")
            $string_conexao = "pgsql:host=projetoscti.com.br; port=54432; 
                 dbname=loja6b; 
                 user=loja6b; password=pF1ydBucfmBJ8w1";
        else {
            $string_conexao = $paramString;
        }

        try { 
          $c = new PDO($string_conexao);
        } catch (PDOException $e) {     
          echo "Serviço indisponivel no momento, 
                tente mais tarde !<br>".$e->getMessage();
          exit;
        }          
        return $c;
    }

    function salvaUpload($id, $paramCaminho, $paramFiles, $paramCampo)
    {   

     if ( isset( $paramFiles[$paramCampo] ) ) {
            $ext = pathinfo($paramFiles[$paramCampo]['name'],
                   PATHINFO_EXTENSION);
            $arquivoImagem = "$paramCaminho/$id.$ext";
            try {
               if (move_uploaded_file($paramFiles[$paramCampo]['tmp_name'], 
                   $arquivoImagem)) {
                   echo "<br>Arquivo $arquivoImagem criado com sucesso.\n";
               } 
            } catch (PDOException $e) { 
               echo "Erro, verifique o arquivo se a pasta imagens existe";
            }     
        }
    }
?>
