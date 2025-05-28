<?php
/**
 * Arquivo: criar.php
 * Pasta: app/views/curso/
 * Descrição: Formulário para criação de novo curso ou turma.
 */
?>

<?php include '../app/views/includes/header.php'; ?>

<main class="container mt-5" style="max-width: 600px;">
    <h2 class="mb-4">Novo Curso / Turma</h2>

    <form method="post" action="?url=Curso/salvar">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Curso</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="4"></textarea>
        </div>
        <div class="mb-3">
            <label for="dia" class="form-label">Dia da Semana</label>
            <input type="text" name="dia" id="dia" class="form-control">
        </div>
        <div class="mb-3">
            <label for="horario" class="form-label">Horário</label>
            <input type="text" name="horario" id="horario" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</main>

<?php include '../app/views/includes/footer.php'; ?>
