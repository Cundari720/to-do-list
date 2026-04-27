<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php if (isset($_SESSION["usuario_id"])): ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow">
    <div class="container">
        <a class="navbar-brand" href="index.php">To-Do List</a>
        <div class="d-flex align-items-center text-white">
            <span class="me-3">Olá, <strong><?= htmlspecialchars($_SESSION["usuario"]) ?></strong></span>
            <a href="logout.php" class="btn btn-outline-danger btn-sm">Sair</a>
        </div>
    </div>
</nav>
<?php endif; ?>

<div class="container"> 

