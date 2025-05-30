<?php
/**
 * Arquivo: admin-layout-fechamento.php
 * Pasta: app/views/includes/
 * Descrição: Fechamento do layout base administrativo
 */
?>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    tinymce.init({
      selector: 'textarea.editor',
      plugins: 'link lists',
      toolbar: 'undo redo | bold italic underline | bullist numlist | link',
      menubar: false,
      height: 250
    });
  </script>
</body>
</html>