<?php
// yoga.php
// Formulário de cadastro de Yoga
// Campos: imagem, título, horários, dia, valor, turma, descrição (TinyMCE)
// Upload com GD (imagem principal)
// Testado no XAMPP

include_once("../verifica_login.php"); // Ajuste o caminho conforme necessário
include_once("../includes/_header.php");
include_once("../includes/_menu.php");
?>
<div class="container">
    <h1 class="mb-4">Cadastrar Aula de Yoga</h1>
    <form action="processar_yoga.php" method="post" enctype="multipart/form-data">
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
