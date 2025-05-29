<?php
/**
 * Arquivo: criar.php
 * Pasta: app/views/evento/
 * Descrição: Formulário de criação de evento
 */
?>

<?php include '../app/views/includes/admin-layout.php'; ?>

<h2 class="mb-4">Novo Evento</h2>

<form method="post" action="?url=Evento/criar" enctype="multipart/form-data">
  <div class="mb-3">
    <label class="form-label">Título</label>
    <input type="text" name="titulo" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Descrição</label>
    <textarea name="descricao" class="form-control" rows="4" required></textarea>
  </div>

  <div class="mb-3">
    <label class="form-label">Local</label>
    <input type="text" name="local" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Data do Evento</label>
    <input type="date" name="data_evento" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Horário</label>
    <input type="text" name="horario" class="form-control" required>
  </div>

  <div class="form-check mb-3">
    <input class="form-check-input" type="checkbox" name="destaque" id="destaque">
    <label class="form-check-label" for="destaque">Destacar evento</label>
  </div>

  <div class="mb-3">
    <label class="form-label">Status</label>
    <select name="status" class="form-select">
      <option value="ativo">Ativo</option>
      <option value="inativo">Inativo</option>
    </select>
  </div>

  <p class="mt-4 fw-bold">Imagens</p>
  <div class="mb-2"><input type="file" name="imagem_menor"> (miniatura)</div>
  <div class="mb-2"><input type="file" name="imagem_maior"> (imagem principal)</div>
  <div class="mb-2"><input type="file" name="imagem01"> (galeria 1)</div>
  <div class="mb-2"><input type="file" name="imagem02"> (galeria 2)</div>
  <div class="mb-2"><input type="file" name="imagem03"> (galeria 3)</div>

  <button type="submit" class="btn btn-success mt-4">Salvar Evento</button>
</form>

<?php include '../app/views/includes/admin-layout-fechamento.php'; ?>
