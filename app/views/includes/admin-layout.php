// Aqui começa arquivo 01: admin-layout.php
// Local: app/views/includes/

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin AMA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="/ama/public/css/admin.css" rel="stylesheet">
</head>
<body>
  <div class="d-flex" id="wrapper">
    <?php include '../app/views/includes/sidebar.php'; ?>

    <div id="page-content-wrapper" class="w-100">
      <nav class="navbar navbar-light bg-light border-bottom">
        <div class="container-fluid">
          <button class="btn btn-outline-secondary" id="menu-toggle">☰</button>
          <span class="ms-auto">
            <a href="?url=Login/sair" class="btn btn-outline-danger btn-sm">Sair</a>
          </span>
        </div>
      </nav>

      <div class="container-fluid mt-4">

// Aqui termina arquivo 01

