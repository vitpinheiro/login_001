<?php
defined('CONTROL') or die('Acesso negado!');

// Verifica se a sessão já está ativa antes de iniciar uma nova
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    die('Acesso negado!');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicação</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mt-3 mb-3">
            <h3>Bem-vindo a aplicação!</h3>
            <a href="index.php?rota=logout" class="btn btn-danger btn-sm" style="font-size: 0.75rem; padding: 5px 10px;">Sair</a>
        </div>
        <hr>
        <span>Usuário: <strong><?= htmlspecialchars($_SESSION['usuario']) ?></strong></span>
        <hr>
        [conteúdo]
    </div>
</body>
</html>