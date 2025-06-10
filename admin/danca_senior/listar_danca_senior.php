<?php
// listar_danca_senior.php
// Listagem de aulas de Dança Sênior
// Testado no XAMPP

include_once("../includes/_header.php");
include_once("../includes/_menu.php");
include_once("../includes/_conexao.php");

// Buscar registros
$sql = "SELECT * FROM danca_senior ORDER BY titulo";
$result = $mysqli->query($sql);
?>
<div class="container">
    <h1 class="mb-4">Aulas de Dança Sênior - Listagem</h1>
    <a href="danca_senior.php" class="btn btn-primary mb-3">Cadastrar Nova Aula</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Título</th>
                <th>Horários</th>
                <th>Dia</th>
                <th>Valor (R$)</th>
                <th>Turma</th>
                <th>Atualizado por</th>
                <th>Atualizado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td>
                            <?php if (!empty($row['imagem'])): ?>
                                <img src="../uploads/danca_senior/<?php echo htmlspecialchars($row['imagem']); ?>" alt="Imagem" style="width: 100px; height: auto;">
                            <?php else: ?>
                                Sem imagem
                            <?php endif; ?>
                        </td>
                        <td><?php echo htmlspecialchars($row['titulo']); ?></td>
                        <td><?php echo htmlspecialchars($row['horarios']); ?></td>
                        <td><?php echo htmlspecialchars($row['dia']); ?></td>
                        <td><?php echo number_format($row['valor'], 2, ',', '.'); ?></td>
                        <td><?php echo htmlspecialchars($row['turma']); ?></td>
                        <td><?php echo htmlspecialchars($row['atualizado_por']); ?></td>
                        <td>
                            <?php echo $row['atualizado_em'] ? date('d/m/Y H:i', strtotime($row['atualizado_em'])) : '-'; ?>
                        </td>
                        <td>
                            <a href="editar_danca_senior.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="excluir_danca_senior.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta aula?');">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="9">Nenhuma aula cadastrada.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php include_once("../includes/_footer.php"); ?>
