<?php
/**
 * Arquivo: index.php
 * Pasta: app/views/logs/
 * Descrição: Página de listagem dos registros de log do sistema.
 */
?>

<?php include '../app/views/includes/header.php'; ?>

<main class="container mt-5">
    <h2 class="mb-4">Registros de Atividades</h2>

    <?php if (empty($data['logs'])): ?>
        <div class="alert alert-info">Nenhum registro de log encontrado.</div>
    <?php else: ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Usuário</th>
                    <th>Ação</th>
                    <th>Página</th>
                    <th>Data e Hora</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['logs'] as $log): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($log['usuario']); ?></td>
                        <td><?php echo htmlspecialchars($log['acao']); ?></td>
                        <td><?php echo htmlspecialchars($log['pagina']); ?></td>
                        <td><?php echo date('d/m/Y H:i:s', strtotime($log['data_hora'])); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</main>

<?php include '../app/views/includes/footer.php'; ?>
