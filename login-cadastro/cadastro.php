<?php
include('util.php');

echo '<link rel="stylesheet" href="../style.css">';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = conecta();

    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $confirmar_senha = $_POST['confirmar-senha'] ?? '';

    if ($senha !== $confirmar_senha) {
        echo "<p style='color: #FF6B6B;'>As senhas não coincidem!</p>";
    } else {
        $varSQL = "INSERT INTO usuario (nome, email, telefone, senha) VALUES (:nome, :email, :telefone, :senha)";
        $insert = $conn->prepare($varSQL);
        $insert->bindParam(':nome', $nome);
        $insert->bindParam(':email', $email);
        $insert->bindParam(':telefone', $telefone);
        $insert->bindParam(':senha', $senha);

        if ($insert->execute()) {
            echo "<p style='color: #00D4AA;'>Usuário cadastrado com sucesso!</p>";
        } else {
            echo "<p style='color: #FF6B6B;'>Erro ao cadastrar usuário.</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lead - Criar Conta</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body class="page-body">

    <main class="login">
        <section>
            <h1>Criar uma conta</h1>

            <form action="#" method="post">
                <div class="form-group">
                    <label class="form-label" for="nome">Nome completo:</label>
                    <input class="form-input" type="text" id="nome" name="nome" placeholder="Digite seu nome completo" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">E-mail:</label>
                    <input class="form-input" type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="telefone">Telefone:</label>
                    <input class="form-input" type="tel" id="telefone" name="telefone" placeholder="Digite seu telefone">
                </div>

                <div class="form-group">
                    <label class="form-label" for="senha">Senha:</label>
                    <input class="form-input" type="password" id="senha" name="senha" placeholder="Crie uma senha" minlength="6" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="confirmar-senha">Confirmar senha:</label>
                    <input class="form-input" type="password" id="confirmar-senha" name="confirmar-senha" placeholder="Digite a senha novamente" minlength="6" required>
                </div>

                <button class="btn-cadastrar" type="submit">Cadastrar</button>
            </form>

            <p>
                Já possui uma conta?</br>
                <a href="login.php">Fazer login</a></br>
            </p>

            <p>
                <a href="../index.html">Voltar para a página inicial</a>
            </p>
        </section>
    </main>

</body>
</html>