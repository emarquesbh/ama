<?php
include_once("../includes/_header.php");
include_once("../includes/_menu.php");
include_once("../includes/conexao.php");
$filtro = isset($_GET['filtro']) ? trim($_GET['filtro']) : '';
$sql = "SELECT * FROM contatos" . ($filtro ? " WHERE nome LIKE '%$filtro%' OR email LIKE '%$filtro%'" : "") . " ORDER BY id DESC";
$result = $mysqli->query($sql);
?>
<div class="container">
  <h1 class="mb-4">Mensagens de Contato</h1>
  <form method="get" class="mb-3">
    <div class="input-group">
      <input type="text" name="filtro" class="form-control" placeholder="Buscar por nome ou email" value="<?php echo htmlspecialchars($filtro); ?>">
      <button class="btn btn-primary" type="submit">Filtrar</button>
    </div>
  </form>
  <table class="table table-bordered table-striped">
    <thead><tr><th>Nome</th><th>Email</th><th>Assunto</th><th>Mensagem</th></tr></thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?php echo htmlspecialchars($row['nome']); ?></td>
        <td><?php echo htmlspecialchars($row['email']); ?></td>
        <td><?php echo htmlspecialchars($row['assunto']); ?></td>
        <td><?php echo nl2br(htmlspecialchars($row['mensagem'])); ?></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<?php include_once("../includes/_footer.php"); ?>
