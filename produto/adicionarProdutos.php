<html>
<body>
    <form action='insertProdutos.php' method='post' 
        enctype="multipart/form-data">
        Nome<br>
        <input type='text' name='nome' value=''><br>
        descricao<br>
        <input type='text' name='descricao' value=''><br>
        valor_unitario<br>
        <input type='text' name='valor_unitario' value=''><br>
        Imagem<br>
        <input type='file' name='arquivo'><br>
        <input type='submit' value='Salvar'>
    </form>
</body>
</html>