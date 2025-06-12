<?php
// viagens.php
// Local: admin/viagens/
// Formulário de cadastro de viagens
// Campos: título, data, valor, roteiro, descrição, imagem
// Usa TinyMCE e Bootstrap 5

include_once("../includes/_header.php");
include_once("../includes/_menu.php");
?>

<div class="container">
    <h1 class="mb-4">Cadastrar Nova Viagem</h1>

    <form action="processar_viagens.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Data</label>
            <input type="date" name="data" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Valor</label>
            <input type="number" step="0.01" name="valor" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Roteiro</label>
            <input type="text" name="roteiro" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="5"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Imagem Principal</label>
            <input type="file" name="imagem" class="form-control" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Salvar Viagem</button>
    </form>
</div>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: '#descricao',
    menubar: false,
    language: 'pt_BR'
  });
</script>

<?php include_once("../includes/_footer.php"); ?>
