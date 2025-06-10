<?php
// curso_add.php
// Tela de cadastro de novo curso
// Upload de imagem principal (gera imagem_menor + imagem_maior com GD)
// Upload opcional de até 3 imagens para galeria
// Formulário com campos: nome, descrição (TinyMCE), dias, horário, mensalidade, imagens
// Testado no XAMPP com banco ama

include_once("../includes/_header.php");
include_once("../includes/_menu.php");
?>
<div class="container">
    <h1 class="mb-4">Adicionar Novo Curso</h1>
    <form action="curso_add.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Nome do Curso:</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Descrição:</label>
            <textarea name="descricao" class="form-control tinymce"></textarea>
        </div>
        <div class="mb-3">
            <label>Dias:</label>
            <input type="text" name="dias" class="form-control">
        </div>
        <div class="mb-3">
            <label>Horário:</label>
            <input type="text" name="horario" class="form-control">
        </div>
        <div class="mb-3">
            <label>Mensalidade (R$):</label>
            <input type="text" name="mensalidade" class="form-control">
        </div>
        <div class="mb-3">
            <label>Imagem principal:</label>
            <input type="file" name="imagem_principal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Galeria (até 3 imagens - opcional):</label>
            <input type="file" name="galeria[]" class="form-control" multiple>
        </div>
        <button type="submit" class="btn btn-success">Cadastrar Curso</button>
    </form>
</div>
<?php include_once("../includes/_footer.php"); ?>
