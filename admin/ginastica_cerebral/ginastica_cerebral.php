<?php

// listar_ginastica_cerebral.php
// Listagem de registros do curso Ginástica Cerebral
// Local: admin/ginastica_cerebral/
// Exibe todos os registros com filtro, botões para editar e excluir
// Integra com os arquivos: editar_ginastica_cerebral.php, excluir_ginastica_cerebral.php
// Utiliza Bootstrap 5 para layout responsivo e acessível
// Compatível com XAMPP e preparado para público 60+

include_once("../includes/_header.php");
include_once("../includes/_menu.php");

// Conecta ao banco de dados
$mysqli = new mysqli("localhost", "root", "", "ama");
if ($mysqli->connect_error) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

// Busca os registros
$sql = "SELECT * FROM ginastica_cerebral ORDER BY titulo ASC";
$result = $mysqli->query($sql);
?>

<div class="container">
    <h1 class="mb-4">Ginástica Cerebral - Listagem</h1>
    <a href="ginastica_cerebral.php" class="btn btn-success mb-3">Novo Cadastro</a>

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>Título</th>
                <th>Horário</th>
                <th>Dia</th>
                <th>Valor</th>
                <th>Turma</th>
                <th>Imagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['titulo']); ?></td>
                        <td><?php echo htmlspecialchars($row['horarios']); ?></td>
                        <td><?php echo htmlspecialchars($row['dia']); ?></td>
                        <td>R$ <?php echo number_format($row['valor'], 2, ',', '.'); ?></td>
                        <td><?php echo htmlspecialchars($row['turma']); ?></td>
                        <td>
                            <?php if (!empty($row['imagem'])): ?>
                                <img src="../../uploads/ginastica_cerebral/<?php echo $row['imagem']; ?>" alt="Imagem" width="80">
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="editar_ginastica_cerebral.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="excluir_ginastica_cerebral.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este registro?');">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="7">Nenhum registro encontrado.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include_once("../includes/_footer.php"); ?>
