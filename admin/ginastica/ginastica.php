<?php
// ginastica.php
include_once("../includes/_header.php");
// Formulário de cadastro de Ginástica
// Campos: imagem, título, horários, dia, valor, turma, descrição (TinyMCE)
// Upload com GD (imagem principal)
// Testado no XAMPP


?>
<div class="container">
    <h1 class="mb-4">Cadastrar Aula de Ginástica</h1>
    <form action="processar_ginastica.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Imagem (obrigatória):</label>
            <input type="file" name="imagem" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Título:</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Horários:</label>
            <input type="text" name="horarios" class="form-control">
        </div>
        <div class="mb-3">
            <label>Dia:</label>
            <input type="text" name="dia" class="form-control">
        </div>
        <div class="mb-3">
            <label>Valor (R$):</label>
            <input type="text" name="valor" class="form-control">
        </div>
        <div class="mb-3">
            <label>Turma:</label>
            <input type="text" name="turma" class="form-control">
        </div>
        <div class="mb-3">
            <label>Descrição:</label>
            <textarea name="descricao" class="form-control tinymce"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
</div>
<?php include_once("../includes/_footer.php"); ?>
