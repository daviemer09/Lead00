<?php
session_start();
include('util.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = conecta();

    $user = $_POST['email'] ?? '';
    $pass = $_POST['senha'] ?? '';

    if (!empty($user) && !empty($pass)) {
        $varSQL = "SELECT * FROM usuario WHERE email = :email";
        $select = $conn->prepare($varSQL);
        $select->bindParam(':email', $user);

        if ($select->execute()) {
            $linha = $select->fetch(PDO::FETCH_ASSOC);

            if ($linha) {
                if ($linha['senha'] === $pass) {
                    $_SESSION['usuario'] = $linha['email'];
                    echo "<p style='color: #00D4AA;'>Olá " . htmlspecialchars($user) . "</p>";
                } else {
                    echo "<p style='color: #FF6B6B;'>Senha inválida</p>";
                }
            } else {
                echo "<p style='color: #FF6B6B;'>Usuário não encontrado!</p>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Lead</title>
    <link rel="stylesheet" href="../style.css"/>
</head>
<body class="page-body">

    <main class="login">
        <section>
            <h1>Lead - Login</h1>

            <form action="#" method="post">

                <div class="form-group">
                    <label class="form-label" for="email">E-mail:</label>
                    <input 
                        class="form-input"
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="Digite seu e-mail"
                        required
                    >
                </div>

                <div class="form-group">
                    <label class="form-label" for="senha">Senha:</label>
                    <input 
                        class="form-input"
                        type="password" 
                        id="senha" 
                        name="senha" 
                        placeholder="Digite sua senha"
                        required
                    >
                </div>

                <div class="form-group-checkbox">
                    <input 
                        type="checkbox" 
                        id="lembrar" 
                        name="lembrar"
                    >
                    <label for="lembrar" class="checkbox-label">Lembrar de mim</label>
                </div>

                <button class="btn-cadastrar" type="submit">Entrar</button>

            </form>

            <p>
                Ainda não possui uma conta?
                <a href="../adicionarUsuario.php">Cadastre-se</a>
            </p>

            <p>
                <a href="../index.html">Voltar para a página inicial</a>
            </p>

        </section>
    </main>

</body>
</html>