
<h1>Lista de Cursos</h1>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Status</th>
    </tr>
    <?php if (!empty($cursos)): ?>
        <?php foreach ($cursos as $curso): ?>
        <tr>
            <td><?= htmlspecialchars($curso['id']) ?></td>
            <td><?= htmlspecialchars($curso['nome']) ?></td>
            <td><?= $curso['status'] ? 'Ativo' : 'Inativo' ?></td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="3">Nenhum curso cadastrado.</td></tr>
    <?php endif; ?>
</table>
