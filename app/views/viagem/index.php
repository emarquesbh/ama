<?php
/**
 * Arquivo: index.php
 * Pasta: app/views/viagem/
 * Descrição: Listagem de viagens cadastradas
 */
?>

<?php include '../app/views/includes/admin-layout.php'; ?>

<h2 class="mb-4">Viagens Cadastradas</h2>

<a href="?url=Viagem/criar" class="btn btn-primary mb-3">Nova Viagem</a>

<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Título</th>
      <th>Destino</th>
      <th>Saída</th>
      <th>Retorno</th>
      <th>Valor</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($dados['viagens'] as $viagem): ?>
    <tr>
      <td><?= $viagem['id'] ?></td>
      <td><?= htmlspecialchars($viagem['titulo']) ?></td>
      <td><?= htmlspecialchars($viagem['destino']) ?></td>
      <td><?= date('d/m/Y', strtotime($viagem['data_saida'])) ?></td>
      <td><?= date('d/m/Y', strtotime($viagem['data_retorno'])) ?></td>
      <td>R$ <?= number_format($viagem['valor'], 2, ',', '.') ?></td>
      <td><?= $viagem['status'] ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include '../app/views/includes/admin-layout-fechamento.php'; ?>
