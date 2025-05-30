

<?php include '../app/views/includes/admin-layout.php'; ?>

<h2 class="mb-4">Novo Evento</h2>

<form method="post" action="?url=Evento/criar" enctype="multipart/form-data">
  <div class="mb-3">
    <label class="form-label">Título</label>
    <input type="text" name="titulo" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Descrição</label>
    <textarea name="descricao" class="form-control editor" required></textarea>
  </div>

  <div class="mb-3">
    <label class="form-label">Data do Evento</label>
    <input type="date" name="data_evento" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Horário</label>
    <input type="time" name="horario" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Local</label>
    <input type="text" name="local" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Imagem</label>
    <input type="file" name="imagem" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">Status</label>
    <select name="status" class="form-select">
      <option value="ativo">Ativo</option>
      <option value="inativo">Inativo</option>
    </select>
  </div>

  <div class="form-check mb-3">
    <input class="form-check-input" type="checkbox" name="destaque" id="destaque">
    <label class="form-check-label" for="destaque">Destaque este evento</label>
  </div>

  <button type="submit" class="btn btn-success">Salvar Evento</button>
</form>

<?php include '../app/views/includes/admin-layout-fechamento.php'; ?>

