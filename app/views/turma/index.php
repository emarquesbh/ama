<?php
/**
 * Arquivo: index.php
 * Pasta: app/views/turma/
 * Descrição: Listagem das turmas de um curso específico.
 */
?>

<?php include '../app/views/includes/header.php'; ?>

<main class="container mt-5">
    <h2 class="mb-4">Turmas do Curso</h2>

    <a href="?url=Turma/criar/<?php echo $data['curso_id']; ?>" class="btn btn-success mb-3">Adicionar Nova Turma</a>

    <div class="alert alert-info">
        Listagem de turmas será exibida aqui futuramente.
    </div>
</main>

<?php include '../app/views/includes/footer.php'; ?>
