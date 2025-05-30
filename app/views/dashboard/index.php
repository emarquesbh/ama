<?php
/**
 * Arquivo: index.php
 * Pasta: app/views/dashboard/
 * Descrição: Painel administrativo com atalhos para os módulos
 */
?>

<?php include '../app/views/includes/admin-layout.php'; ?>

<h2 class="mb-4">Dashboard - Painel Administrativo</h2>

<div class="row">
  <div class="col-md-4 mb-4">
    <a href="?url=Curso/index" class="btn btn-primary w-100">Cursos</a>
  </div>
  <div class="col-md-4 mb-4">
    <a href="?url=Turma/index" class="btn btn-primary w-100">Turmas</a>
  </div>
  <div class="col-md-4 mb-4">
    <a href="?url=Evento/index" class="btn btn-primary w-100">Eventos</a>
  </div>
  <div class="col-md-4 mb-4">
    <a href="?url=Aviso/index" class="btn btn-primary w-100">Avisos</a>
  </div>
  <div class="col-md-4 mb-4">
    <a href="?url=Mensagem/index" class="btn btn-primary w-100">Mensagens (Reflexão / Palavra do Padre)</a>
  </div>
  <div class="col-md-4 mb-4">
    <a href="?url=Viagem/index" class="btn btn-primary w-100">Viagens</a>
  </div>
  <div class="col-md-4 mb-4">
    <a href="?url=Logs/index" class="btn btn-secondary w-100">Logs do Sistema</a>
  </div>
</div>

<?php include '../app/views/includes/admin-layout-fechamento.php'; ?>
