<?php
/**
 * Arquivo: index.php
 * Pasta: app/views/mensagem/
 * Descrição: Listagem de Reflexões e Palavras do Padre
 */
?>

<?php include '../app/views/includes/header.php'; ?>

<h2>Mensagens</h2>
<a href="?url=Mensagem/criar" class="btn btn-success mb-3">Nova Mensagem</a>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Título</th>
      <th>Tipo</th>
      <th>Data</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($mensagens as $msg): ?>
      <tr>
        <td><?= htmlspecialchars($msg['titulo']) ?></td>
        <td><?= ucfirst($msg['tipo']) ?></td>
        <td><?= date('d/m/Y', strtotime($msg['data_criacao'])) ?></td>
        <td>
          <a href="?url=Mensagem/ver/<?= $msg['id'] ?>" class="btn btn-sm btn-primary">Ver</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include '../app/views/includes/footer.php'; ?>
