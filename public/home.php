<?php
defined('CONTROL') or die('Acesso negado!');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicação</title>
</head>
<body>
    <h3>Bem-vindo a aplicação!</h3>    
    <hr>
    <span>Usuário: <strong><?= $SESSION['usuario'] ?></strong></span>
</body>
</html>