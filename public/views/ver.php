<?php
/**
 * Arquivo: ver.php
 * Pasta: public/views/viagens/
 * Descrição: Visualização pública de uma viagem
 */
?>

<?php include '../../includes/public-layout.php'; ?>

<article class="mt-4">
  <h2><?= htmlspecialchars($viagem['titulo']) ?></h2>
  <p><strong>Destino:</strong> <?= htmlspecialchars($viagem['destino']) ?></p>
  <p><strong>Data de Saída:</strong> <?= date('d/m/Y', strtotime($viagem['data_saida'])) ?></p>
  <p><strong>Data de Retorno:</strong> <?= date('d/m/Y', strtotime($viagem['data_retorno'])) ?></p>
  <p><strong>Valor:</strong> R$ <?= number_format($viagem['valor'], 2, ',', '.') ?></p>

  <a href="https://wa.me/5500000000000?text=Quero saber mais sobre a viagem <?= urlencode($viagem['titulo']) ?>" class="btn btn-success mt-3" target="_blank">Falar no WhatsApp</a>
</article>

<?php include '../../includes/public-layout-fechamento.php'; ?>
