

<?php include '../app/views/includes/admin-layout.php'; ?>

<h2 class="mb-4">Nova Viagem</h2>

<form method="post" action="?url=Viagem/criar">
  <div class="mb-3">
    <label class="form-label">Título</label>
    <input type="text" name="titulo" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Destino</label>
    <input type="text" name="destino" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Data de Saída</label>
    <input type="date" name="data_saida" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Data de Retorno</label>
    <input type="date" name="data_retorno" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Valor (R$)</label>
    <input type="number" step="0.01" name="valor" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Status</label>
    <select name="status" class="form-select">
      <option value="ativo">Ativo</option>
      <option value="inativo">Inativo</option>
    </select>
  </div>

  <button type="submit" class="btn btn-success">Salvar Viagem</button>
</form>

<?php include '../app/views/includes/admin-layout-fechamento.php'; ?>

