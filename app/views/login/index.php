
// Aqui começa código 5: app/views/login/index.php
// Pasta: app/views/login/

<?php include '../app/views/includes/header.php'; ?>

<main class="container mt-5" style="max-width: 400px;">
    <h3 class="mb-4">Acesso ao Sistema AMA</h3>

    <?php if (!empty($_SESSION['erro'])): ?>
        <div class="alert alert-danger"><?php echo $_SESSION['erro']; unset($_SESSION['erro']); ?></div>
    <?php endif; ?>

    <form method="post" action="?url=Login/autenticar">
        <div class="mb-3">
            <label for="usuario" class="form-label">Usuário</label>
            <input type="text" name="usuario" id="usuario" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" name="senha" id="senha" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary w-100">Entrar</button>
    </form>
</main>

<?php include '../app/views/includes/footer.php'; ?>

// Aqui termina código 5