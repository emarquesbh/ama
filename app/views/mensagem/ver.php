<?php
/**
 * Arquivo: ver.php
 * Pasta: app/views/mensagem/
 * Descrição: Visualização completa da mensagem
 */
?>

<?php include '../app/views/includes/header.php'; ?>

<h2><?= htmlspecialchars($mensagem['titulo']) ?></h2>
<p><strong>Tipo:</strong> <?= ucfirst($mensagem['tipo']) ?></p>
<p><strong>Data:</strong> <?= date('d/m/Y', strtotime($mensagem['data_criacao'])) ?></p>
<hr>
<div><?= $mensagem['descricao'] ?></div>

<?php if (!empty($mensagem['video_url'])): ?>
  <hr>
  <div class="ratio ratio-16x9">
    <iframe src="<?= $mensagem['video_url'] ?>" title="Vídeo do YouTube" allowfullscreen></iframe>
  </div>
<?php endif; ?>

<a href="?url=Mensagem/index" class="btn btn-secondary mt-3">Voltar</a>

<?php include '../app/views/includes/footer.php'; ?>
