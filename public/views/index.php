

<?php include '../../includes/public-layout.php'; ?>

<h2 class="mb-4">Calendário de Viagens</h2>
<div id="calendario"></div>

<h3 class="mt-5">Próximas Viagens</h3>
<div class="row">
  <?php foreach ($viagens as $viagem): ?>
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <h5 class="card-title"><?= htmlspecialchars($viagem['titulo']) ?></h5>
          <p class="card-text">
            <strong>Destino:</strong> <?= htmlspecialchars($viagem['destino']) ?><br>
            <strong>Saída:</strong> <?= date('d/m/Y', strtotime($viagem['data_saida'])) ?><br>
            <strong>Retorno:</strong> <?= date('d/m/Y', strtotime($viagem['data_retorno'])) ?><br>
            <strong>Valor:</strong> R$ <?= number_format($viagem['valor'], 2, ',', '.') ?>
          </p>
          <a href="?url=viagens/ver/<?= $viagem['id'] ?>" class="btn btn-outline-primary">Leia mais</a>
          <a href="https://wa.me/5500000000000?text=Quero saber mais sobre a viagem <?= urlencode($viagem['titulo']) ?>" target="_blank" class="btn btn-success mt-2">WhatsApp</a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendario');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      events: <?= json_encode(array_map(function($v) {
        return [
          'title' => $v['titulo'],
          'start' => $v['data_saida'],
          'url' => '?url=viagens/ver/' . $v['id']
        ];
      }, $viagens)); ?>
    });
    calendar.render();
  });
</script>

<?php include '../../includes/public-layout-fechamento.php'; ?>
