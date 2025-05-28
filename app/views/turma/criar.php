<?php
/**
 * Arquivo: criar.php
 * Pasta: app/views/turma/
 * Descrição: Formulário para adicionar uma nova turma vinculada a um curso.
 */
?>

<?php include '../app/views/includes/header.php'; ?>

<main class="container mt-5" style="max-width: 600px;">
    <h2 class="mb-4">Nova Turma</h2>

    <form method="post" action="?url=Turma/salvar">
        <input type="hidden" name="curso_id" value="<?php echo $data['curso_id']; ?>">

        <div class="mb-3">
            <label for="dia" class="form-label">Dia da Semana</label>
            <input type="text" name="dia" id="dia" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="horario" class="form-label">Horário</label>
            <input type="text" name="horario" id="horario" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="ativa" selected>Ativa</option>
                <option value="cheia">Cheia</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Turma</button>
    </form>
</main>

<?php include '../app/views/includes/footer.php'; ?>
