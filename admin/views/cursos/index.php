
<h1>Cursos</h1>
<a href="index.php?controller=Curso&action=create">Novo Curso</a>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Status</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($cursos as $curso): ?>
    <tr>
        <td><?= $curso['id'] ?></td>
        <td><?= $curso['nome'] ?></td>
        <td><?= $curso['status'] ? 'Ativo' : 'Inativo' ?></td>
        <td>
            <a href="index.php?controller=Curso&action=edit&id=<?= $curso['id'] ?>">Editar</a> |
            <a href="index.php?controller=Curso&action=delete&id=<?= $curso['id'] ?>" onclick="return confirm('Confirma exclusão?')">Excluir</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
