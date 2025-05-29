<?php
/**
 * Arquivo: index.php
 * Pasta: app/views/home/
 * Descrição: Painel administrativo com atalhos principais.
 */
?>

<?php include '../app/views/includes/admin-layout.php'; ?>

<h2 class="mb-4">Painel Administrativo</h2>

<div class="row g-4">
    <div class="col-md-4">
        <a href="?url=Curso/index" class="text-decoration-none">
            <div class="card shadow-sm text-center p-3 border-success">
                <h4 class="text-success">Cursos</h4>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="?url=Turma/index" class="text-decoration-none">
            <div class="card shadow-sm text-center p-3 border-primary">
                <h4 class="text-primary">Turmas</h4>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="?url=Logs/index" class="text-decoration-none">
            <div class="card shadow-sm text-center p-3 border-dark">
                <h4 class="text-dark">Logs</h4>
            </div>
        </a>
    </div>
</div>

<?php include '../app/views/includes/admin-layout-fechamento.php'; ?>
