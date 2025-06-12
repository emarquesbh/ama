<?php
// admin/includes/_menu.php
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="/clube/admin/">Clube AMA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal" aria-controls="menuPrincipal" aria-expanded="false" aria-label="Alternar navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menuPrincipal">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="/clube/admin/ginastica/listar_ginastica.php">Ginástica</a></li>
                <li class="nav-item"><a class="nav-link" href="/clube/admin/yoga/listar_yoga.php">Yoga</a></li>
                <li class="nav-item"><a class="nav-link" href="/clube/admin/cursos/listar_cursos.php">Cursos</a></li>
                <li class="nav-item"><a class="nav-link" href="/clube/admin/avisos/listar_avisos.php">Avisos</a></li>
                <li class="nav-item"><a class="nav-link" href="/clube/admin/galeria/listar_galeria.php">Galeria</a></li>
                <!-- Adicione mais links conforme necessário -->
            </ul>
        </div>
    </div>
</nav>
</body>
</html>
