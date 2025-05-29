<?php
/**
 * Arquivo: index.php
 * Pasta: app/views/evento/
 * Descrição: Listagem de eventos cadastrados
 */
?>

<?php include '../app/views/includes/admin-layout.php'; ?>

<h2 class="mb-4">Eventos Cadastrados</h2>

<a href="?url=Evento/criar" class="btn btn-primary mb-3">Novo Evento</a>

<table class="table table-bordered table-hover">
  <thead class="table-light">
    <tr>
      <th>Título</th>
      <th>Data</th>
      <th>Horário</th>
      <th>Local</th>
      <th>Status</th>
      <th>Destaque</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($dados['eventos'] as $evento): ?>
      <tr>
        <td><?= htmlspecialchars($evento['titulo']) ?></td>
        <td><?= date('d/m/Y', strtotime($evento['data_evento'])) ?></td>
        <td><?= htmlspecialchars($evento['horario']) ?></td>
        <td><?= htmlspecialchars($evento['local']) ?></td>
        <td><?= $evento['status'] === 'ativo' ? '✔️ Ativo' : '❌ Inativo' ?></td>
        <td><?= $evento['destaque'] ? '⭐ Sim' : '—' ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include '../app/views/includes/admin-layout-fechamento.php'; ?>
