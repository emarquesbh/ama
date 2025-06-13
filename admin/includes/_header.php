<?php
// _header.php - cabeçalho com menu acessível e centralizado
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Clube AMA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Segoe UI', sans-serif;
        }
        .navbar {
            background-color: #003366;
        }
        .navbar-brand, .nav-link, .dropdown-toggle {
            color: #ffffff !important;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
        }
        .container-centralizado {
            max-width: 900px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/clube/admin/dashboard.php">Clube AMA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarConteudo" aria-controls="navbarConteudo" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarConteudo">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="avisosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Avisos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="avisosDropdown">
                        <li><a class="dropdown-item" href="/clube/admin/avisos/avisos_add.php">Adicionar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/avisos/listar_avisos.php">Listar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/avisos/avisos_edit.php">Editar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/avisos/avisos_delete.php">Deletar</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="bonecandoDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Bonecando
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="bonecandoDropdown">
                        <li><a class="dropdown-item" href="/clube/admin/bonecando/bonecando_add.php">Adicionar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/bonecando/listar_bonecando.php">Listar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/bonecando/bonecando_edit.php">Editar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/bonecando/bonecando_delete.php">Deletar</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="celularDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Celular
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="celularDropdown">
                        <li><a class="dropdown-item" href="/clube/admin/celular/celular_add.php">Adicionar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/celular/listar_celular.php">Listar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/celular/celular_edit.php">Editar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/celular/celular_delete.php">Deletar</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="coralDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Coral
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="coralDropdown">
                        <li><a class="dropdown-item" href="/clube/admin/coral/coral_add.php">Adicionar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/coral/listar_coral.php">Listar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/coral/coral_edit.php">Editar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/coral/coral_delete.php">Deletar</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="cursosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Cursos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="cursosDropdown">
                        <li><a class="dropdown-item" href="/clube/admin/cursos/cursos_add.php">Adicionar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/cursos/listar_cursos.php">Listar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/cursos/cursos_edit.php">Editar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/cursos/cursos_delete.php">Deletar</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="danca_salaoDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Danca Salao
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="danca_salaoDropdown">
                        <li><a class="dropdown-item" href="/clube/admin/danca_salao/danca_salao_add.php">Adicionar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/danca_salao/listar_danca_salao.php">Listar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/danca_salao/danca_salao_edit.php">Editar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/danca_salao/danca_salao_delete.php">Deletar</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="danca_seniorDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Danca Senior
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="danca_seniorDropdown">
                        <li><a class="dropdown-item" href="/clube/admin/danca_senior/danca_senior_add.php">Adicionar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/danca_senior/listar_danca_senior.php">Listar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/danca_senior/danca_senior_edit.php">Editar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/danca_senior/danca_senior_delete.php">Deletar</a></li>
                    </ul>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="eventosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Eventos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="eventosDropdown">
                        <li><a class="dropdown-item" href="/clube/admin/eventos/eventos_add.php">Adicionar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/eventos/listar_eventos.php">Listar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/eventos/eventos_edit.php">Editar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/eventos/eventos_delete.php">Deletar</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="galeriaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Galeria
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="galeriaDropdown">
                        <li><a class="dropdown-item" href="/clube/admin/galeria/galeria_add.php">Adicionar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/galeria/listar_galeria.php">Listar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/galeria/galeria_edit.php">Editar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/galeria/galeria_delete.php">Deletar</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="ginasticaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ginastica
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="ginasticaDropdown">
                        <li><a class="dropdown-item" href="/clube/admin/ginastica/ginastica_add.php">Adicionar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/ginastica/listar_ginastica.php">Listar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/ginastica/ginastica_edit.php">Editar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/ginastica/ginastica_delete.php">Deletar</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="grupo_reflexaoDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Grupo Reflexao
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="grupo_reflexaoDropdown">
                        <li><a class="dropdown-item" href="/clube/admin/grupo_reflexao/grupo_reflexao_add.php">Adicionar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/grupo_reflexao/listar_grupo_reflexao.php">Listar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/grupo_reflexao/grupo_reflexao_edit.php">Editar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/grupo_reflexao/grupo_reflexao_delete.php">Deletar</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="informaticaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Informatica
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="informaticaDropdown">
                        <li><a class="dropdown-item" href="/clube/admin/informatica/informatica_add.php">Adicionar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/informatica/listar_informatica.php">Listar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/informatica/informatica_edit.php">Editar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/informatica/informatica_delete.php">Deletar</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="lian_gongDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Lian Gong
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="lian_gongDropdown">
                        <li><a class="dropdown-item" href="/clube/admin/lian_gong/lian_gong_add.php">Adicionar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/lian_gong/listar_lian_gong.php">Listar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/lian_gong/lian_gong_edit.php">Editar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/lian_gong/lian_gong_delete.php">Deletar</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="noticiasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Noticias
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="noticiasDropdown">
                        <li><a class="dropdown-item" href="/clube/admin/noticias/noticias_add.php">Adicionar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/noticias/listar_noticias.php">Listar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/noticias/noticias_edit.php">Editar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/noticias/noticias_delete.php">Deletar</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="postura_alongamentoDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Postura Alongamento
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="postura_alongamentoDropdown">
                        <li><a class="dropdown-item" href="/clube/admin/postura_alongamento/postura_alongamento_add.php">Adicionar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/postura_alongamento/listar_postura_alongamento.php">Listar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/postura_alongamento/postura_alongamento_edit.php">Editar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/postura_alongamento/postura_alongamento_delete.php">Deletar</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="programacaoDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Programacao
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="programacaoDropdown">
                        <li><a class="dropdown-item" href="/clube/admin/programacao/programacao_add.php">Adicionar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/programacao/listar_programacao.php">Listar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/programacao/programacao_edit.php">Editar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/programacao/programacao_delete.php">Deletar</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="reflexaoDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Reflexao
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="reflexaoDropdown">
                        <li><a class="dropdown-item" href="/clube/admin/reflexao/reflexao_add.php">Adicionar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/reflexao/listar_reflexao.php">Listar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/reflexao/reflexao_edit.php">Editar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/reflexao/reflexao_delete.php">Deletar</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="turmasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Turmas
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="turmasDropdown">
                        <li><a class="dropdown-item" href="/clube/admin/turmas/turmas_add.php">Adicionar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/turmas/listar_turmas.php">Listar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/turmas/turmas_edit.php">Editar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/turmas/turmas_delete.php">Deletar</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="viagensDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Viagens
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="viagensDropdown">
                        <li><a class="dropdown-item" href="/clube/admin/viagens/viagens_add.php">Adicionar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/viagens/listar_viagens.php">Listar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/viagens/viagens_edit.php">Editar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/viagens/viagens_delete.php">Deletar</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="vida_ativaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Vida Ativa
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="vida_ativaDropdown">
                        <li><a class="dropdown-item" href="/clube/admin/vida_ativa/vida_ativa_add.php">Adicionar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/vida_ativa/listar_vida_ativa.php">Listar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/vida_ativa/vida_ativa_edit.php">Editar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/vida_ativa/vida_ativa_delete.php">Deletar</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="yogaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Yoga
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="yogaDropdown">
                        <li><a class="dropdown-item" href="/clube/admin/yoga/yoga_add.php">Adicionar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/yoga/listar_yoga.php">Listar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/yoga/yoga_edit.php">Editar</a></li>
                        <li><a class="dropdown-item" href="/clube/admin/yoga/yoga_delete.php">Deletar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-centralizado mt-4">


</div> <!-- Fim container centralizado -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
