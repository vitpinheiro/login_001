<?php 
defined('CONTROL') or die('Acesso negado!');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }


    $usuario = $_POST['usuario'] ?? null;
    $senha = $_POST['senha'] ?? null;
    $erro = null;

    // Verifica se os campos foram preenchidos
    if (empty($usuario) || empty($senha)) {
        $erro = "Usuário e senha são obrigatórios!";
    }

    // Verifica se o usuário e a senha são válidos
    if (empty($erro)) {
        $usuarios = require_once __DIR__ . '/../inc/usuarios.php';

        foreach ($usuarios as $user) {
            if ($user['usuario'] === $usuario && password_verify($senha, $user['senha'])) {
                // Efetua o login
                $_SESSION['usuario'] = $usuario;

        
                echo <<<HTML
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Aplicação</title>
                </head>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
                <body>
                    <h3>Bem-vindo a aplicação!</h3>    
                    <hr>
                    <span>Usuário: <strong>{$_SESSION['usuario']}</strong></span> 
                    <span>
                   
                        <a href="index.php?rota=logout" class="btn btn-danger btn-sm" style="font-size: 0.75rem; padding: 5px 10px;">Sair</a>

                    </span>
                    <hr>
                    [conteúdo]
                </body>
                </html>
                HTML;
                exit;
            }
        }

   
        $erro = "Usuário e/ou senha inválidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
            <h3 class="text-center mb-4">Login</h3>
            <form action="index.php?rota=login" method="post">
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuário</label>
                    <input type="text" name="usuario" id="usuario" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" id="senha" class="form-control" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-sm">Entrar</button>
                </div>
            </form>

    
            <?php if (!empty($erro)): ?>
                <p class="text-danger text-center mt-3"><?= htmlspecialchars($erro) ?></p>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
