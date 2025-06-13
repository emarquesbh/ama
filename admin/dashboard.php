<?php
// dashboard.php
// Página inicial da área administrativa
// Exibe atalhos visuais para todos os CRUDs
// Em fase de testes: segurança desabilitada (conforme geral.docx)
// Testado no XAMPP

include_once("includes/_header.php");
?>
<div class="container">
    <h1 class="mb-4">Painel Administrativo - Clube da Amizade</h1>
    <p class="lead">Bem-vindo(a)! Utilize os atalhos abaixo para gerenciar os conteúdos do site.</p>

    <div class="row g-3">
        <div class="col-md-3">
            <a href="ginastica/listar_ginastica.php" class="btn btn-primary w-100">Ginástica</a>
        </div>
        <div class="col-md-3">
            <a href="yoga/listar_yoga.php" class="btn btn-primary w-100">Yoga</a>
        </div>
        <div class="col-md-3">
            <a href="postura_alongamento/listar_postura_alongamento.php" class="btn btn-primary w-100">Postura e Alongamento</a>
        </div>
        <div class="col-md-3">
            <a href="danca_salao/listar_danca_salao.php" class="btn btn-primary w-100">Dança de Salão</a>
        </div>
        <div class="col-md-3">
            <a href="celular/listar_celular.php" class="btn btn-primary w-100">Celular</a>
        </div>
        <div class="col-md-3">
            <a href="informatica/listar_informatica.php" class="btn btn-primary w-100">Informática</a>
        </div>
        <div class="col-md-3">
            <a href="danca_senior/listar_danca_senior.php" class="btn btn-primary w-100">Dança Sênior</a>
        </div>
        <div class="col-md-3">
            <a href="ginastica_cerebral/listar_ginastica_cerebral.php" class="btn btn-primary w-100">Ginástica Cerebral</a>
        </div>
        <div class="col-md-3">
            <a href="lian_gong/listar_lian_gong.php" class="btn btn-primary w-100">Lian Gong</a>
        </div>
        <div class="col-md-3">
            <a href="bonecando/listar_bonecando.php" class="btn btn-primary w-100">Bonecando</a>
        </div>
        <div class="col-md-3">
            <a href="vida_ativa/listar_vida_ativa.php" class="btn btn-primary w-100">Vida Ativa</a>
        </div>
        <div class="col-md-3">
            <a href="coral/listar_coral.php" class="btn btn-primary w-100">Coral</a>
        </div>
        <div class="col-md-3">
            <a href="grupo_reflexao/listar_grupo_reflexao.php" class="btn btn-primary w-100">Grupo Reflexão / Palavra do Padre</a>
        </div>
        <div class="col-md-3">
            <a href="avisos/listar_avisos.php" class="btn btn-primary w-100">Avisos</a>
        </div>
        <div class="col-md-3">
            <a href="programacao/listar_programacao.php" class="btn btn-primary w-100">Programação do Mês</a>
        </div>
        <!-- Aqui você pode futuramente adicionar mais módulos -->
    </div>
</div>
<?php include_once("includes/_footer.php"); ?>
