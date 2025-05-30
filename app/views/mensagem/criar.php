<?php
/**
 * Arquivo: criar.php
 * Pasta: app/views/mensagem/
 * Descrição: Formulário para criação de Reflexão ou Palavra do Padre
 */
?>

<?php include '../app/views/includes/header.php'; ?>

<h2>Nova Mensagem</h2>
<form action="?url=Mensagem/criar" method="POST">
  <div class="mb-3">
    <label for="titulo" class="form-label">Título</label>
    <input type="text" class="form-control" id="titulo" name="titulo" required>
  </div>

  <div class="mb-3">
    <label for="tipo" class="form-label">Tipo</label>
    <select name="tipo" id="tipo" class="form-select" required>
      <option value="reflexao">Reflexão</option>
      <option value="padre">Palavra do Padre</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="descricao" class="form-label">Descrição</label>
    <textarea name="descricao" id="descricao" class="form-control" rows="10"></textarea>
  </div>

  <div class="mb-3">
    <label for="video_url" class="form-label">Vídeo (YouTube)</label>
    <input type="url" name="video_url" id="video_url" class="form-control">
  </div>

  <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<!-- TinyMCE -->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: '#descricao',
    height: 300,
    menubar: false,
    plugins: 'advlist autolink lists link charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime table wordcount',
    toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | code'
  });
</script>

<?php include '../app/views/includes/footer.php'; ?>
