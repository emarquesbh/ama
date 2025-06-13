<?php
// admin/turmas/turmas_add.php

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Turmas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({ selector: '#descricao' });
    </script>
</head>
<body class="container mt-4">
    <h2>Adicionar Novo - Turmas</h2>
    <form method="post" action="processar_turmas.php">
        <input type="hidden" name="acao" value="inserir">

        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" name="titulo" id="titulo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data:</label>
            <input type="date" name="data" id="data" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="dias" class="form-label">Dias:</label>
            <input type="text" name="dias" id="dias" class="form-control">
        </div>

        <div class="mb-3">
            <label for="horarios" class="form-label">Horários:</label>
            <input type="text" name="horarios" id="horarios" class="form-control">
        </div>

        <div class="mb-3">
            <label for="mensalidade" class="form-label">Mensalidade:</label>
            <input type="text" name="mensalidade" id="mensalidade" class="form-control">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="listar_turmas.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>