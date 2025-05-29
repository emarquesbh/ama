<?php
/**
 * Arquivo: index.php
 * Pasta: app/views/log/
 * Descrição: Exibição dos registros de log
 */
?>

<?php include '../app/views/includes/admin-layout.php'; ?>

<h2 class="mb-4">Registros de Log</h2>

<table class="table table-bordered table-hover">
  <thead class="table-light">
    <tr>
      <th>Usuário</th>
      <th>Ação</th>
      <th>Tabela</th>
      <th>ID Registro</th>
      <th>Data/Hora</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($dados['logs'] as $log): ?>
      <tr>
        <td><?= htmlspecialchars($log['usuario']) ?></td>
        <td><?= htmlspecialchars($log['acao']) ?></td>
        <td><?= htmlspecialchars($log['tabela_afetada']) ?></td>
        <td><?= htmlspecialchars($log['registro_id']) ?></td>
        <td><?= date('d/m/Y H:i', strtotime($log['data_hora'])) ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include '../app/views/includes/admin-layout-fechamento.php'; ?>
