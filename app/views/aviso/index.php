<?php
/**
 * Arquivo: index.php
 * Pasta: app/views/aviso/
 * Descrição: Listagem dos avisos cadastrados
 */
?>

<?php include '../app/views/includes/admin-layout.php'; ?>

<h2 class="mb-4">Avisos Cadastrados</h2>

<a href="?url=Aviso/criar" class="btn btn-primary mb-3">Novo Aviso</a>

<table class="table table-bordered table-hover">
  <thead class="table-light">
    <tr>
      <th>Título</th>
      <th>Expira em</th>
      <th>Status</th>
      <th>Destaque</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($dados['avisos'] as $aviso): ?>
      <tr>
        <td><?= htmlspecialchars($aviso['titulo']) ?></td>
        <td><?= date('d/m/Y', strtotime($aviso['data_expiracao'])) ?></td>
        <td><?= $aviso['status'] === 'ativo' ? '✔️ Ativo' : '❌ Inativo' ?></td>
        <td><?= $aviso['destaque'] ? '⭐ Sim' : '—' ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include '../app/views/includes/admin-layout-fechamento.php'; ?>
