<?php
include_once("../includes/_header.php");
include_once("../includes/_conexao.php");
$filtro = isset($_GET['filtro']) ? trim($_GET['filtro']) : '';
$sql = "SELECT * FROM usuarios" . ($filtro ? " WHERE nome LIKE '%$filtro%' OR email LIKE '%$filtro%'" : "") . " ORDER BY nome";
$result = $mysqli->query($sql);
?>
<div class="container">
  <h1 class="mb-4">Usuários</h1>
  <form method="get" class="mb-3">
    <div class="input-group">
      <input type="text" name="filtro" class="form-control" placeholder="Buscar por nome ou email" value="<?php echo htmlspecialchars($filtro); ?>">
      <button class="btn btn-primary" type="submit">Filtrar</button>
      <a href="usuario_add.php" class="btn btn-success">Novo Usuário</a>
    </div>
  </form>
  <table class="table table-bordered table-striped">
    <thead><tr><th>Nome</th><th>Email</th><th>Tipo</th><th>Ações</th></tr></thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?php echo htmlspecialchars($row['nome']); ?></td>
        <td><?php echo htmlspecialchars($row['email']); ?></td>
        <td><?php echo htmlspecialchars($row['tipo']); ?></td>
        <td>
          <a href="usuario_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
          <a href="usuario_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir este usuário?')">Excluir</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<?php include_once("../includes/_footer.php"); ?>
